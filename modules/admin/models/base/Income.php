<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "income".
 *
 * @property integer $voyage_id
 * @property double $fact
 *
 * @property Voyage $voyage
 */
class Income extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'income';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id', 'fact'], 'required'],
            [['voyage_id'], 'integer'],
            [['fact'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => Yii::t('app', 'Voyage ID'),
            'fact' => Yii::t('app', 'Fact'),
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
