<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "customer".
 */
class Customer extends \app\modules\admin\models\base\Customer
{
    /**
     * Возвращает полное имя заказчика
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->name.' ('.$this->company .' )';
    }
}
