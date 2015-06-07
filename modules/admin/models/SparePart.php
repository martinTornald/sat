<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "spare_part".
 */
class SparePart extends \app\modules\admin\models\base\SparePart
{
    /**
     * @return string
     */
    public function getIsPlan()
    {
        return $this->plan == 1 ? 'да' : 'нет';
    }
}
