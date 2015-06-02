<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "driver_distance".
 *
 * @property integer $id
 * @property integer $driver_id
 * @property integer $car_id
 * @property integer $voyage_id
 * @property integer $is_tent
 * @property double $distance
 * @property string $date
 *
 * @property \app\modules\admin\models\Car $car
 * @property \app\modules\admin\models\Driver $driver
 * @property \app\modules\admin\models\Voyage $voyage
 */
class DriverDistance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver_distance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['driver_id', 'car_id', 'voyage_id'], 'required'],
            [['driver_id', 'car_id', 'voyage_id', 'is_tent'], 'integer'],
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
            'driver_id' => 'Водитель',
            'car_id' => 'Машина',
            'voyage_id' => 'Перевозка',
            'is_tent' => 'С тендом',
            'distance' => 'Расстояние',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(\app\modules\admin\models\Car::className(), ['id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(\app\modules\admin\models\Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_id']);
    }
}
