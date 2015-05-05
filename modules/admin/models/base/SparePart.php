<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "spare_part".
 *
 * @property integer $id
 * @property integer $plan
 * @property string $name
 * @property double $price
 *
 * @property Voyage[] $voyages
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
            [['plan'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'plan' => Yii::t('app', 'Запланированная деталь'),
            'name' => Yii::t('app', 'Наименование'),
            'price' => Yii::t('app', 'Цена'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['spare_part_id' => 'id']);
    }
}
