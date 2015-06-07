<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "spare_part".
 *
 * @property integer $id
 * @property integer $voyage_id
 * @property string $name
 * @property integer $plan
 * @property double $price
 * @property string $date
 *
 * @property \app\modules\admin\models\Voyage $voyage
 * @property \app\modules\admin\models\VoyageSparePart[] $voyageSpareParts
 */
class SparePart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'spare_part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id', 'plan'], 'integer'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255]
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
            'name' => 'Наименование запчасти',
            'plan' => 'Запланированная деталь',
            'price' => 'Цена',
            'date' => 'Дата замены',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyageSpareParts()
    {
        return $this->hasMany(\app\modules\admin\models\VoyageSparePart::className(), ['spare_part_id' => 'id']);
    }
}
