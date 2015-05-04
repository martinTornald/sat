<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "car".
 */
class Car extends \app\modules\admin\models\base\Car
{
    public function getFullName()
    {
        return $this->make_model . ' (' . $this->reg_number . ', ' . $this->color . ')';
    }
}
