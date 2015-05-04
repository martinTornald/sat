<?php

namespace app\modules\admin\models;
use Yii;

/**
 * This is the model class for table "driver".
 */
class Driver extends \app\modules\admin\models\base\Driver
{
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
}
