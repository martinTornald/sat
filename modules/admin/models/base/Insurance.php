<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "insurance".
 *
 * @property integer $car_id
 * @property string $name
 * @property string $createdAt
 * @property string $term
 * @property string $description
 *
 * @property Car $car
 */
class Insurance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'insurance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id'], 'required'],
            [['car_id'], 'integer'],
            [['createdAt', 'term'], 'safe'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'car_id' => Yii::t('app', 'Машина'),
            'name' => Yii::t('app', 'Наименование'),
            'createdAt' => Yii::t('app', 'Дата выдачи'),
            'term' => Yii::t('app', 'Срок действия'),
            'description' => Yii::t('app', 'Описание'),
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
