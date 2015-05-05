<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "driver".
 *
 * @property integer $id
 * @property string $passport
 * @property string $surname
 * @property string $name
 * @property string $patronymic
 * @property string $address
 * @property string $phone
 *
 * @property DriverTool[] $driverTools
 * @property Tool[] $tools
 * @property License $license
 * @property Voyage[] $voyages
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['passport', 'surname', 'name', 'patronymic', 'address', 'phone'], 'required'],
            [['passport', 'address', 'phone'], 'string', 'max' => 255],
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
            'address' => Yii::t('app', 'Адрес'),
            'phone' => Yii::t('app', 'Телефон'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverTools()
    {
        return $this->hasMany(\app\modules\admin\models\DriverTool::className(), ['driver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTools()
    {
        return $this->hasMany(\app\modules\admin\models\Tool::className(), ['id' => 'tool_id'])->viaTable('driver_tool', ['driver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLicense()
    {
        return $this->hasOne(\app\modules\admin\models\License::className(), ['driver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['driver_id' => 'id']);
    }
}
