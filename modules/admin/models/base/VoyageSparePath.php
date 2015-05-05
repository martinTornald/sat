<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "voyage_spare_path".
 *
 * @property integer $voyage_id
 * @property integer $spare_part_id
 *
 * @property SparePart $sparePart
 * @property Voyage $voyage
 */
class VoyageSparePath extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voyage_spare_path';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id', 'spare_part_id'], 'required'],
            [['voyage_id', 'spare_part_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => Yii::t('app', 'Voyage ID'),
            'spare_part_id' => Yii::t('app', 'Spare Part ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSparePart()
    {
        return $this->hasOne(\app\modules\admin\models\SparePart::className(), ['id' => 'spare_part_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_id']);
    }
}
