<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "passport".
 *
 * @property integer $id
 * @property integer $number
 * @property string $date
 * @property string $issued
 *
 * @property Driver[] $drivers
 * @property Owner[] $owners
 */
class Passport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number', 'date', 'issued'], 'required'],
            [['id', 'number'], 'integer'],
            [['date'], 'safe'],
            [['issued'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'number' => Yii::t('app', 'Серия и номер паспорта'),
            'date' => Yii::t('app', 'Дата выдачи паспорта'),
            'issued' => Yii::t('app', 'Кем и когда выдан паспорт'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(\app\modules\admin\models\Driver::className(), ['passport_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwners()
    {
        return $this->hasMany(\app\modules\admin\models\Owner::className(), ['passport_id' => 'id']);
    }
}
