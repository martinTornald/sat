<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "voyage".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $car_id
 * @property integer $trailer_id
 * @property integer $driver_id
 * @property integer $status_id
 * @property string $name
 * @property string $description
 * @property string $updated_at
 * @property string $created_at
 *
 * @property \app\modules\admin\models\CarInaction[] $carInactions
 * @property \app\modules\admin\models\Cost $cost
 * @property \app\modules\admin\models\CostDriver $costDriver
 * @property \app\modules\admin\models\Distance $distance
 * @property \app\modules\admin\models\Income $income
 * @property \app\modules\admin\models\Loading $loading
 * @property \app\modules\admin\models\Rate $rate
 * @property \app\modules\admin\models\Unloading $unloading
 * @property \app\modules\admin\models\Car $car
 * @property \app\modules\admin\models\Customer $customer
 * @property \app\modules\admin\models\Driver $driver
 * @property \app\modules\admin\models\Status $status
 * @property \app\modules\admin\models\Trailer $trailer
 * @property \app\modules\admin\models\VoyageDistance[] $voyageDistances
 */
class Voyage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voyage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'car_id', 'trailer_id', 'driver_id', 'status_id'], 'integer'],
            [['description'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
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
            'customer_id' => 'Заказчик',
            'car_id' => 'Машина',
            'trailer_id' => 'Прицеп',
            'driver_id' => 'Водитель',
            'status_id' => 'Статус',
            'name' => 'Название перевозки',
            'description' => 'Описание перевозки',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarInactions()
    {
        return $this->hasMany(\app\modules\admin\models\CarInaction::className(), ['voyage_prev' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCost()
    {
        return $this->hasOne(\app\modules\admin\models\Cost::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostDriver()
    {
        return $this->hasOne(\app\modules\admin\models\CostDriver::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistance()
    {
        return $this->hasOne(\app\modules\admin\models\Distance::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncome()
    {
        return $this->hasOne(\app\modules\admin\models\Income::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoading()
    {
        return $this->hasOne(\app\modules\admin\models\Loading::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRate()
    {
        return $this->hasOne(\app\modules\admin\models\Rate::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnloading()
    {
        return $this->hasOne(\app\modules\admin\models\Unloading::className(), ['voyage_id' => 'id']);
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
    public function getCustomer()
    {
        return $this->hasOne(\app\modules\admin\models\Customer::className(), ['id' => 'customer_id']);
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
    public function getStatus()
    {
        return $this->hasOne(\app\modules\admin\models\Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrailer()
    {
        return $this->hasOne(\app\modules\admin\models\Trailer::className(), ['id' => 'trailer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyageDistances()
    {
        return $this->hasMany(\app\modules\admin\models\VoyageDistance::className(), ['voyage_id' => 'id']);
    }
}
