<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "driver_distance".
 */
class VoyageDistance extends \app\modules\admin\models\base\VoyageDistance
{
    /**
     * @return string
     */
    public function getTent()
    {
        return $this->is_tent == 1 ? 'да' : 'нет';
    }


}
