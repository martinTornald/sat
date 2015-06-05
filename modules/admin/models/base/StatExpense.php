<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "stat_expense".
 *
 * @property integer $stat_id
 * @property double $fuel
 * @property double $salary
 * @property double $transport_cost
 *
 * @property \app\modules\admin\models\Stat $stat
 */
class StatExpense extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stat_expense';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stat_id'], 'required'],
            [['stat_id'], 'integer'],
            [['fuel', 'salary', 'transport_cost'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stat_id' => 'Stat ID',
            'fuel' => 'Топливо',
            'salary' => 'Зарплата водителя',
            'transport_cost' => 'Транспортные издержки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStat()
    {
        return $this->hasOne(\app\modules\admin\models\Stat::className(), ['id' => 'stat_id']);
    }
}
