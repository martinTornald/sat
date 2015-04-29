<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "owner".
 *
 * @property integer $id
 * @property string $passport
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $phone
 *
 * @property Car[] $cars
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport', 'surname', 'name', 'patronymic', 'phone'], 'required'],
            [['passport', 'phone'], 'string', 'max' => 255],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'passport' => Yii::t('app', 'Паспорт'),
            'surname' => Yii::t('app', 'Фамилия'),
            'name' => Yii::t('app', 'Имя'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(\app\modules\admin\models\Car::className(), ['owner_id' => 'id']);
    }
}
