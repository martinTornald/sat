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

            // Создание записи о оплате перевозки
            $sparePart = \Yii::createObject([
                'class'          => SparePart::className(),
                'voyage_id'      => $this->id,
            ]);
            $sparePart->save(false);

            // Создание записи о разгрузке перевозки
            $unloading = \Yii::createObject([
                'class'          => Unloading::className(),
                'voyage_id'      => $this->id,
            ]);
            $unloading->save(false);
        }
        parent::afterSave($insert, $changedAttributes);
    }
}
