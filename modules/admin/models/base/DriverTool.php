<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "driver_tool".
 *
 * @property integer $driver_id
 * @property integer $tool_id
 * @property string $date_of_issue
 * @property string $date_delivery
 * @property string $description
 *
 * @property Driver $driver
 * @property Tool $tool
 */
class DriverTool extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'driver_tool';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['driver_id', 'tool_id'], 'required'],
            [['driver_id', 'tool_id'], 'integer'],
            [['date_of_issue', 'date_delivery'], 'safe'],
            [['description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'driver_id' => Yii::t('app', 'Водители'),
            'tool_id' => Yii::t('app', 'Инструменты'),
            'date_of_issue' => Yii::t('app', 'Дата выдачи'),
            'date_delivery' => Yii::t('app', 'Дата сдачи'),
            'description' => Yii::t('app', 'Описание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(\app\modules\admin\models\Driver::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTool()
    {
        return $this->hasOne(\app\modules\admin\models\Tool::className(), ['id' => 'tool_id']);
    }
}
