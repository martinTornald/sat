<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "car".
 */
class Car extends \app\modules\admin\models\base\Car
{
    /**
     * Возвращает подробное имя машины
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->make_model . ' (' . $this->reg_number . ', ' . $this->color . ')';
    }

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {

            // Создание страхового полиса
            $insurance = \Yii::createObject([
                'class'       => Insurance::className(),
                'car_id'      => $this->id,
            ]);
            $insurance->save(false);

        }
        parent::afterSave($insert, $changedAttributes);
    }
}
