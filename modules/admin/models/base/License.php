<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "license".
 *
 * @property integer $driver_id
 * @property string $number
 * @property string $type
 * @property string $description
 * @property string $date_of_issue
 * @property string $term
 *
 * @property Driver $driver
 */
class License extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'license';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['driver_id'], 'required'],
            [['driver_id'], 'integer'],
            [['description'], 'string'],
            [['date_of_issue', 'term'], 'safe'],
            [['number'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'driver_id' => Yii::t('app', 'Driver ID'),
            'number' => Yii::t('app', 'Номер'),
            'type' => Yii::t('app', 'Категории'),
            'description' => Yii::t('app', 'Description'),
            'date_of_issue' => Yii::t('app', 'Дата выдачи'),
            'term' => Yii::t('app', 'Срок выдачи'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(\app\modules\admin\models\Driver::className(), ['id' => 'driver_id']);
    }
}
