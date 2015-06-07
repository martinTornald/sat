<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "voyage_spare_part".
 *
 * @property integer $id
 * @property integer $voyage_id
 * @property integer $spare_part_id
 *
 * @property \app\modules\admin\models\SparePart $sparePart
 * @property \app\modules\admin\models\Voyage $voyage
 */
class VoyageSparePart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voyage_spare_part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'voyage_id', 'spare_part_id'], 'required'],
            [['id', 'voyage_id', 'spare_part_id'], 'integer']
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
            'spare_part_id' => 'Spare Part ID',
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
