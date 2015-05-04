<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "owner".
 *
 * @property integer $id
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $passport
 * @property string $phone
 *
 * @property Car[] $cars
 * @property Trailer[] $trailers
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
            [['surname', 'name', 'patronymic', 'passport', 'phone'], 'required'],
            [['surname', 'name', 'patronymic'], 'string', 'max' => 50],
            [['passport', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'surname' => Yii::t('app', 'Фамилия'),
            'name' => Yii::t('app', 'Имя'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'passport' => Yii::t('app', 'Паспорт'),
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrailers()
    {
        return $this->hasMany(\app\modules\admin\models\Trailer::className(), ['owner_id' => 'id']);
    }
}
