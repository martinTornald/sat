<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "spare_part".
 *
 * @property integer $voyage_id
 * @property integer $plan
 * @property string $name
 * @property double $price
 *
 * @property Voyage $voyage
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
            [['voyage_id'], 'required'],
            [['voyage_id', 'plan'], 'integer'],
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
            'voyage_id' => Yii::t('app', 'Перевозка'),
            'plan' => Yii::t('app', 'Запланированная деталь'),
            'name' => Yii::t('app', 'Наименование'),
            'price' => Yii::t('app', 'Цена'),
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
