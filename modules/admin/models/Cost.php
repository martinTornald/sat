<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cost".
 */
class Cost extends \app\modules\admin\models\base\Cost
{
    function getFullCost() {
        return $this->fact;
    }
}
