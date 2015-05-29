<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "car_inaction".
 */
class CarInaction extends \app\modules\admin\models\base\CarInaction
{
    /**
     * Возвращает подробное имя машины
     *
     * @return string
     */
    public function getInactionTime($param = 1)
    {
        $inactionTime = 0;
        $prev = strtotime($this->voyagePrev->unloading->fact);
        $next = strtotime($this->voyageNext->loading->fact);
        if ($next > $prev) {
            $inactionTime = ( $next - $prev ) / $param;
        }
        return $inactionTime;
    }

}
