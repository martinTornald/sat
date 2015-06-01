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
        $timeFormat = 60 * 60 * 24;
        $inactionTime = 0;
        $prev = strtotime($this->voyagePrev->unloading->fact);
        $next = strtotime($this->voyageNext->loading->fact);
        if ($next > $prev) {
            $res = $next - $prev;
            $inactionTime = $res / $timeFormat;
        }
        return  round($inactionTime, 0);
    }

}
