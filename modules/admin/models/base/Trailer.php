<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "trailer".
 *
 * @property integer $id
 * @property string $make_model
 * @property string $number
 * @property string $type
 * @property string $year
 * @property string $reg_number
 * @property string $reg_certificate
 * @property integer $id_owner
 * @property string $photo
 *
 * @property Voyage[] $voyages
 */
class Trailer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trailer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'safe'],
            [['id_owner'], 'integer'],
            [['make_model', 'type', 'reg_number', 'reg_certificate', 'photo'], 'string', 'max' => 255],
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
            'make_model' => Yii::t('app', 'Модель'),
            'number' => Yii::t('app', 'Номер'),
            'type' => Yii::t('app', 'Тип'),
            'year' => Yii::t('app', 'Год выпуска'),
            'reg_number' => Yii::t('app', 'Регистрационный номер'),
            'reg_certificate' => Yii::t('app', 'Регистрационный сертификат'),
            'id_owner' => Yii::t('app', 'Владелец'),
            'photo' => Yii::t('app', 'Фото'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['trailer_id' => 'id']);
    }
}
