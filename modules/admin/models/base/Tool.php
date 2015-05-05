<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "tool".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $description
 *
 * @property DriverTool[] $driverTools
 * @property Driver[] $drivers
 */
class Tool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tool';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['description'], 'string'],
            [['type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Тип'),
            'name' => Yii::t('app', 'Наименование'),
            'description' => Yii::t('app', 'Описание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverTools()
    {
        return $this->hasMany(\app\modules\admin\models\DriverTool::className(), ['tool_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDrivers()
    {
        return $this->hasMany(\app\modules\admin\models\Driver::className(), ['id' => 'driver_id'])->viaTable('driver_tool', ['tool_id' => 'id']);
    }
}
