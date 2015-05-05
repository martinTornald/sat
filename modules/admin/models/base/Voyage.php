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
 * @property Cost $cost
 * @property CostDriver $costDriver
 * @property Distance $distance
 * @property Income $income
 * @property Loading $loading
 * @property Rate $rate
 * @property Unloading $unloading
 * @property Status $status
 * @property Car $car
 * @property Customer $customer
 * @property Driver $driver
 * @property Trailer $trailer
 * @property VoyageSparePath[] $voyageSparePaths
 * @property SparePart[] $spareParts
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
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Заказчик'),
            'car_id' => Yii::t('app', 'Машина'),
            'trailer_id' => Yii::t('app', 'Прицеп'),
            'driver_id' => Yii::t('app', 'Водитель'),
            'status_id' => Yii::t('app', 'Статус'),
            'name' => Yii::t('app', 'Название перевозки'),
            'description' => Yii::t('app', 'Описание перевозки'),
            'updated_at' => Yii::t('app', 'Дата обновления'),
            'created_at' => Yii::t('app', 'Дата создания'),
        ];
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
    public function getStatus()
    {
        return $this->hasOne(\app\modules\admin\models\Status::className(), ['id' => 'status_id']);
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
    public function getTrailer()
    {
        return $this->hasOne(\app\modules\admin\models\Trailer::className(), ['id' => 'trailer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyageSparePaths()
    {
        return $this->hasMany(\app\modules\admin\models\VoyageSparePath::className(), ['voyage_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpareParts()
    {
        return $this->hasMany(\app\modules\admin\models\SparePart::className(), ['id' => 'spare_part_id'])->viaTable('voyage_spare_path', ['voyage_id' => 'id']);
    }
}
