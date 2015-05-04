<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "customer".
 *
 * @property integer $id
 * @property string $company
 * @property string $name
 * @property string $phone
 *
 * @property Voyage[] $voyages
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company'], 'string', 'max' => 127],
            [['name', 'phone'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'company' => Yii::t('app', 'Компания'),
            'name' => Yii::t('app', 'Имя'),
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['customer_id' => 'id']);
    }
}
