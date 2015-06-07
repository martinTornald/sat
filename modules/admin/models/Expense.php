<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "expense".
 */
class Expense extends \app\modules\admin\models\base\Expense
{
    public static function setExpense() {
        $incomes = Income::find()->all();
        foreach($incomes as $income) {
            if(!empty($income->voyage->cost->plan)) {
                $gasoline = 30;
                $distance =  $income->voyage->distance->fact/100;
                $income->voyage->expense->fuel = $gasoline*$distance;

                // Генерация случайного ремонта
                if (rand(1, 10) == 3) {
                    $income->voyage->expense->repair = rand(1, 2000);
                } else {
                    $income->voyage->expense->repair = 0;
                }
                $income->voyage->expense->save();
            }
        }
    }


}
