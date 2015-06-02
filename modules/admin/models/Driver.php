<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "driver".
 */
class Driver extends \app\modules\admin\models\base\Driver
{
    /**
     * Возвращает полное имя владельца
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $license = \Yii::createObject([
                'class'          => License::className(),
                'driver_id'      => $this->id,
            ]);
            $license->save(false);
        }
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return array
     */
    public function getDataArray()
    {
        $data = array();
        $currentYear = date('Y');
        $currentMount = date('m');

        for ($year = $currentYear; $year >= 2014; $year--) {
            if($year == $currentYear) {
                $mount = $currentMount;
            } else {
                $mount = 12;
            }
            for (; $mount > 0; $mount--) {
                array_push($data, array(
                        'period' => $year . '-' . sprintf('%02d', $mount),
                        'count' => 0
                    )
                );
            }


        }
        return $data;
    }

    /**
     * @return array
     */
    public function getMountDistance()
    {
        $mountDistances = $this->getDataArray();
        $voyages = $this->voyages;

        foreach($voyages as $voyage) {
            $voyageMountDistances = $voyage->mountDistance;

            foreach($voyageMountDistances as $key => $voyageMountDistance) {
                $i = 0;
                while( $mountDistances[$i]['period'] != $key &&  $i < count($mountDistances) ) {
                    $i++;
                }
                if($i != count($mountDistances)) {
                    $mountDistances[$i]['count'] += $voyageMountDistance;
                }

            }

        }
        return $mountDistances;
    }

}
