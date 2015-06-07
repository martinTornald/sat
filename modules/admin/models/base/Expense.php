<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "expense".
 *
 * @property integer $voyage_id
 * @property double $fuel
 * @property double $repair
 *
 * @property \app\modules\admin\models\Voyage $voyage
 */
class Expense extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expense';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id'], 'required'],
            [['voyage_id'], 'integer'],
            [['fuel', 'repair'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => 'Перевозка',
            'fuel' => 'Бензин',
            'repair' => 'Ремонт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_id']);
    }
}
