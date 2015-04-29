<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "cost".
 *
 * @property integer $voyage_id
 * @property double $plan
 * @property double $fact
 *
 * @property Voyage $voyage
 */
class Cost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id'], 'required'],
            [['voyage_id'], 'integer'],
            [['plan', 'fact'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => Yii::t('app', 'Перевозка'),
            'plan' => Yii::t('app', 'Планируемая стоимость'),
            'fact' => Yii::t('app', 'Фактическая стоимость'),
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
