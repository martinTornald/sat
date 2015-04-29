<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "insurance".
 *
 * @property integer $id
 * @property string $name
 * @property string $createdAt
 * @property string $term
 * @property string $description
 *
 * @property Car[] $cars
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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Наименование'),
            'createdAt' => Yii::t('app', 'Дата выдачи'),
            'term' => Yii::t('app', 'Срок действия'),
            'description' => Yii::t('app', 'Описание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(\app\modules\admin\models\Car::className(), ['insurance_id' => 'id']);
    }
}
