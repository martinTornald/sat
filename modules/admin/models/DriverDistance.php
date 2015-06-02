<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "driver_distance".
 */
class DriverDistance extends \app\modules\admin\models\base\DriverDistance
{
    /**
     * @return string
     */
    public function getTent()
    {
        return $this->is_tent == 1 ? 'да' : 'нет';
    }

}
