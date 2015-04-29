<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "cost_driver".
 *
 * @property integer $voyage_id
 * @property double $costs
 *
 * @property Voyage $voyage
 */
class CostDriver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cost_driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id'], 'required'],
            [['voyage_id'], 'integer'],
            [['costs'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => Yii::t('app', 'Перевозка'),
            'costs' => Yii::t('app', 'Расходы'),
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
