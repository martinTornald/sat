<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "car".
 */
class Car extends \app\modules\admin\models\base\Car
{
    /**
     * Возвращает подробное имя машины
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->make_model . ' (' . $this->reg_number . ', ' . $this->color . ')';
    }

    /**
     * Возвращает полное время простоя
     *
     * @return string
     */
    public function getFullInaction()
    {
        $carInactions = $this->carInactions;
        $fullInaction = 0;
        $timeFormat = 60 * 60 * 24 ;
        foreach ($carInactions as $carInaction) {
            $fullInaction += $carInaction->inactionTime / $timeFormat;
        }

        return round($fullInaction/$timeFormat, 0);
    }

    /**
     * Ищет вреенной промежуток по номеру квартала и году
     *
     * @return array
     */
    function getQuarterInterval($quarter, $year = NULL)
    {
        if (!$year) {
            $year = date('Y');
        }

        $start = array();
        $end = array();

        $start['year'] = $year;
        $start['month'] = ($quarter - 1) * 3 + 1;
        $start['day'] = 1;

        $end['year'] = $year;
        $end['month'] = ($quarter) * 3;
        $end['day'] = cal_days_in_month(CAL_GREGORIAN, ($quarter) * 3, $year);

        return array(
            'start' => new \DateTime(implode('-', $start)),
            'end' => new \DateTime(implode('-', $end)),
        );
    }

    /**
     * Возвращает простои в кварталах
     *
     * @return array
     */
    public function getQuarterInaction()
    {
        $carInactions = $this->carInactions;
        $dateLast = new \DateTime();
        $dateStart = $dateLast;

        $yearNext = 2014;
        $dateNow = new \DateTime();
        $yearNow = $dateNow->format('Y');
        $quarterInaction = array();
        $timeFormat = 60 * 60 * 24;

        while ($yearNext <= $yearNow) {
            for ($i = 2; $i <= 4; $i++) {
                $quarter = $this->getQuarterInterval($i, $yearNext);

                $quarterStart = strtotime($quarter['start']->format('d.m.Y'));
                $quarterEnd = strtotime($quarter['end']->format('d.m.Y'));
                $currentQuarterInaction = 0;

                foreach ($carInactions as $carInaction) {
                    $carInactionStart = strtotime($carInaction->voyagePrev->unloading->fact);
                    $carInactionEnd = strtotime($carInaction->voyageNext->loading->fact);

                    $quarterFactStart = 0;
                    $quarterFactEnd = 0;


                    if ($carInactionStart < $quarterEnd && $carInactionEnd > $quarterStart) {

                        if ($carInactionStart >= $quarterStart) {
                            $quarterFactStart = $carInactionStart;
                        } else {
                            $quarterFactStart = $quarterStart;
                        }

                        if ($carInactionEnd > $quarterEnd) {
                            $quarterFactEnd = $quarterEnd;
                        } else {
                            $quarterFactEnd = $carInactionEnd;
                        }

                        if ($quarterFactStart > 0 && $quarterFactEnd > 0) {
                            $quarterFact = $quarterFactEnd - $quarterFactStart;
                            $currentQuarterInaction += $quarterFact;
                        }
                    }
                }


                array_push($quarterInaction, array(
                    'start' => $quarter['start']->format('d.m.Y'),
                    'end' => $quarter['end']->format('d.m.Y'),
                    'quarter' => $quarter['start']->format('d.m.Y') .' - '. $quarter['end']->format('d.m.Y'),
                    'count' => round($currentQuarterInaction / $timeFormat, 0),
                ));
            }
            $yearNext++;
        }

        return $quarterInaction;
    }

    /** @inheritdoc */
    public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {

            // Создание страхового полиса
            $insurance = \Yii::createObject([
                'class' => Insurance::className(),
                'car_id' => $this->id,
            ]);
            $insurance->save(false);

        }
        parent::afterSave($insert, $changedAttributes);
    }

}
