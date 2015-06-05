<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "stat_income".
 *
 * @property integer $stat_id
 * @property double $plan
 * @property double $fact
 *
 * @property \app\modules\admin\models\Stat $stat
 */
class StatIncome extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stat_income';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stat_id'], 'required'],
            [['stat_id'], 'integer'],
            [['plan', 'fact'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stat_id' => 'Stat ID',
            'plan' => 'Планируемая прибль',
            'fact' => 'Fact',
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
