<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "car".
 *
 * @property integer $id
 * @property integer $owner_id
 * @property integer $insurance_id
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
 * @property Owner $owner
 * @property Insurance $insurance
 * @property Voyage[] $voyages
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
            [['owner_id', 'insurance_id', 'mileage'], 'integer'],
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
            'id' => Yii::t('app', 'ID'),
            'owner_id' => Yii::t('app', 'Владельц'),
            'insurance_id' => Yii::t('app', 'Страховка'),
            'make_model' => Yii::t('app', 'Модель'),
            'number' => Yii::t('app', 'Номер'),
            'color' => Yii::t('app', 'Цвет'),
            'year' => Yii::t('app', 'Год выпуска'),
            'reg_number' => Yii::t('app', 'Регистрационный номер'),
            'reg_certificate' => Yii::t('app', 'Регистрационный сертификат'),
            'mileage' => Yii::t('app', 'Пробег'),
            'photo' => Yii::t('app', 'Фото'),
            'cost' => Yii::t('app', 'Стоимость'),
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
    public function getInsurance()
    {
        return $this->hasOne(\app\modules\admin\models\Insurance::className(), ['id' => 'insurance_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['car_id' => 'id']);
    }
}
