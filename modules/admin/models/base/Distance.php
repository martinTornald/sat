<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "distance".
 *
 * @property integer $voyage_id
 * @property double $plan
 * @property double $fact
 *
 * @property Voyage $voyage
 */
class Distance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distance';
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
            'plan' => Yii::t('app', 'Ожидаемая дальность'),
            'fact' => Yii::t('app', 'Фактическая дальность'),
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
