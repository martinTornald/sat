<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "owner".
 */
class Owner extends \app\modules\admin\models\base\Owner
{
    public function getFullName()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }
}
