<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "loading".
 *
 * @property integer $voyage_id
 * @property string $place
 * @property string $plan
 * @property string $fact
 *
 * @property Voyage $voyage
 */
class Loading extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loading';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id'], 'required'],
            [['voyage_id'], 'integer'],
            [['plan', 'fact'], 'safe'],
            [['place'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => Yii::t('app', 'Перевозка'),
            'place' => Yii::t('app', 'Место загрузки'),
            'plan' => Yii::t('app', 'Ожидаемая дата загрузки'),
            'fact' => Yii::t('app', 'Фактическая дата загрузки'),
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
