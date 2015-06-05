<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "stat_expense".
 */
class StatExpense extends \app\modules\admin\models\base\StatExpense
{
    /**
     * @return string
     */
    public function getFullExpense()
    {
        return $this->fuel  + $this->salary + $this->transport_cost;
    }
}
