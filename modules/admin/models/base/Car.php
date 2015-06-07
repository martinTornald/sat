<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "car".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property string $make_model
 * @property string $number
 * @property string $color
 * @property string $year
 * @property string $reg_number
 * @property string $reg_certificate
 * @property integer $mileage
 * @property string $photo
 * @property double $cost
 *
 * @property \app\modules\admin\models\Owner $owner
 * @property \app\modules\admin\models\CarInaction[] $carInactions
 * @property \app\modules\admin\models\Insurance $insurance
 * @property \app\modules\admin\models\Stat[] $stats
 * @property \app\modules\admin\models\Voyage[] $voyages
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'mileage'], 'integer'],
            [['year'], 'safe'],
            [['cost'], 'number'],
            [['make_model', 'color', 'reg_number', 'reg_certificate', 'photo'], 'string', 'max' => 255],
            [['number'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Владельц',
            'make_model' => 'Модель',
            'number' => 'Номер',
            'color' => 'Цвет',
            'year' => 'Год выпуска',
            'reg_number' => 'Регистрационный номер',
            'reg_certificate' => 'Регистрационный сертификат',
            'mileage' => 'Пробег',
            'photo' => 'Фото',
            'cost' => 'Стоимость',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(\app\modules\admin\models\Owner::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarInactions()
    {
        return $this->hasMany(\app\modules\admin\models\CarInaction::className(), ['car_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInsurance()
    {
        return $this->hasOne(\app\modules\admin\models\Insurance::className(), ['car_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStats()
    {
        return $this->hasMany(\app\modules\admin\models\Stat::className(), ['car_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['car_id' => 'id']);
    }
}
