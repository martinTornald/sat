<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "spare_part".
 *
 * @property integer $id
 * @property integer $car_id
 * @property string $name
 * @property integer $plan
 * @property double $price
 * @property string $date
 *
 * @property \app\modules\admin\models\Car $car
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
            [['car_id', 'plan'], 'integer'],
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
            'car_id' => 'Машина',
            'name' => 'Наименование',
            'plan' => 'Запланированная деталь',
            'price' => 'Цена',
            'date' => 'Дата замены',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(\app\modules\admin\models\Car::className(), ['id' => 'car_id']);
    }
}
