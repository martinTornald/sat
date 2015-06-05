<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "stat".
 *
 * @property integer $id
 * @property integer $car_id
 * @property string $date
 *
 * @property \app\modules\admin\models\Car $car
 * @property \app\modules\admin\models\StatExpense $statExpense
 * @property \app\modules\admin\models\StatInaction[] $statInactions
 * @property \app\modules\admin\models\StatIncome $statIncome
 */
class Stat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'date'], 'required'],
            [['car_id'], 'integer'],
            [['date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Машина',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(\app\modules\admin\models\Car::className(), ['id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatExpense()
    {
        return $this->hasOne(\app\modules\admin\models\StatExpense::className(), ['stat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatInactions()
    {
        return $this->hasMany(\app\modules\admin\models\StatInaction::className(), ['stat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatIncome()
    {
        return $this->hasOne(\app\modules\admin\models\StatIncome::className(), ['stat_id' => 'id']);
    }
}
