<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "voyage_distance".
 *
 * @property integer $id
 * @property integer $voyage_id
 * @property integer $is_tent
 * @property double $distance
 * @property string $date
 *
 * @property \app\modules\admin\models\Voyage $voyage
 */
class VoyageDistance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voyage_distance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id'], 'required'],
            [['voyage_id', 'is_tent'], 'integer'],
            [['distance'], 'number'],
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
            'voyage_id' => 'Перевозка',
            'is_tent' => 'С тентом',
            'distance' => 'Растояние',
            'date' => 'Дата',
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
