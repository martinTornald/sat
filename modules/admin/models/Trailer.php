<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "trailer".
 */
class Trailer extends \app\modules\admin\models\base\Trailer
{
    public function getFullName()
    {
        return $this->make_model . ' (' . $this->reg_number . ', ' . $this->type . ')';
    }
}
