<?php

namespace app\modules\admin\models;

use app\components\DateTimeStampBehavior;

use Yii;
use yii\db\BaseActiveRecord;

/**
 * This is the model class for table "voyage".
 */
class Voyage extends \app\modules\admin\models\base\Voyage
{

    /**
     * @return string
     */
    public function getFullDistance()
    {
        $voyageDistances = $this->voyageDistances;
        $fullDistance = 0;
        foreach($voyageDistances as $voyageDistance) {
            $fullDistance += $voyageDistance->distance;
        }
        return $fullDistance;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->name . ' (' . $this->id . ')';
    }

    public function getPriceCostDriver() {
        $priceCostDriver = 0;
        switch($this->car_id) {
            case 0:
            case 1:
            case 2:
            case 3:
                $priceCostDriver = 3500;
                break;
            case 4:
            case 5:
                $priceCostDriver = 4000;
                break;
        }
        return $priceCostDriver;
    }

    public function behaviors()
    {
        return [
            'DateTimeStampBehavior' => [
                'class' => DateTimeStampBehavior::className(),
                'attributes' => [
                    BaseActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                    BaseActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ]
            ]
        ];
    }

    public static function setExpense() {
        $voyages = Voyage::find()->all();
        foreach($voyages as $voyage) {
            if(empty($voyage->expense)) {
                // Создание записи стоимости для перевозки
                $expense = \Yii::createObject([
                    'class'          => Expense::className(),
                    'voyage_id'      => $voyage->id,
                ]);
                $expense->save(false);
            }
        }
    }

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {

            // Создание записи стоимости для перевозки
            $cost = \Yii::createObject([
                'class'          => Cost::className(),
                'voyage_id'      => $this->id,
            ]);
            $cost->save(false);

            // Создание записи по опрате услуг водителя для перевозки
            $costDriver = \Yii::createObject([
                'class'          => CostDriver::className(),
                'voyage_id'      => $this->id,
            ]);
            $costDriver->save(false);

            // Создание записи маршрута для перевозки
            $distance = \Yii::createObject([
                'class'          => Distance::className(),
                'voyage_id'      => $this->id,
            ]);
            $distance->save(false);

            // Создание записи о доходе перевозки
            $income = \Yii::createObject([
                'class'          => Income::className(),
                'voyage_id'      => $this->id,
            ]);
            $income->save(false);

            // Создание записи о загрузке перевозки
            $loading = \Yii::createObject([
                'class'          => Loading::className(),
                'voyage_id'      => $this->id,
            ]);
            $loading->save(false);

            // Создание записи о оплате перевозки
            $rate = \Yii::createObject([
                'class'          => Rate::className(),
                'voyage_id'      => $this->id,
            ]);
            $rate->save(false);

            // Создание записи о разгрузке перевозки
            $unloading = \Yii::createObject([
                'class'          => Unloading::className(),
                'voyage_id'      => $this->id,
            ]);
            $unloading->save(false);

            // Создание записи стоимости для перевозки
            $expense = \Yii::createObject([
                'class'          => Expense::className(),
                'voyage_id'      => $this->id,
            ]);
            $expense->save(false);

            // Создание информации о простое
            $voyageInactionLast = CarInaction::find()->where(['car_id' => $this->car_id ])->orderBy('id DESC')->one();

            $carInaction = \Yii::createObject([
                'class'          => CarInaction::className(),
                'voyage_prev'      => $voyageInactionLast->voyageNext->id,
                'voyage_next'      => $this->id,
            ]);
            $carInaction->save(false);

        }
        parent::afterSave($insert, $changedAttributes);
    }


    public function getMountDistance()
    {
        $data = array();
        $voyageDistances = $this->voyageDistances;
        foreach($voyageDistances as $voyageDistance) {
            $path = date('Y-m', strtotime($voyageDistance->date));
            if(empty($data[$path])) {

                $data[$path] = 0;
            }
            $data[$path] += $voyageDistance->distance;
        }
        return $data;
    }

    public function getCostSparePartAll() {
        $voyageSpareParts = $this->voyageSpareParts;
        $costSparePartAll = 0;
        foreach($voyageSpareParts as $voyageSparePart) {
            $costSparePartAll += $voyageSparePart->sparePart->price;
        }
        return $costSparePartAll;
    }

    public function updateDistance() {
        $this->distance->fact = $this->fullDistance;
        $this->distance->save();
        $this->costDriver->costs = $this->distance->fact / 100 * $this->priceCostDriver;
        $this->costDriver->save();
        $this->updateIncome();
    }

    public function updateIncome() {

        if(empty($this->cost->fact)) {

            $costPlan = 0;
        } else {
            $costPlan = $this->cost->fact;
        }

        $this->income->fact = $costPlan - $this->expense->fullExpense  - $this->costDriver->costs;
        $this->income->save();
    }

}
