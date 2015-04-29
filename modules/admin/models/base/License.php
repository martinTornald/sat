<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "license".
 *
 * @property integer $id
 * @property string $number
 * @property string $name
 * @property string $description
 * @property string $date_of_issue
 * @property string $term
 *
 * @property Driver[] $drivers
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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['description'], 'string'],
            [['date_of_issue', 'term'], 'safe'],
            [['number'], 'string', 'max' => 50],
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
            'number' => Yii::t('app', 'Номер'),
            'name' => Yii::t('app', 'Название'),
            'description' => Yii::t('app', 'Description'),
            'date_of_issue' => Yii::t('app', 'Дата выдачи'),
            'term' => Yii::t('app', 'Срок выдачи'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(\app\modules\admin\models\Driver::className(), ['license_id' => 'id']);
    }
}
