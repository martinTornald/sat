<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "tool".
 *
 * @property integer $id
 * @property string $type
 * @property integer $name
 * @property string $description
 *
 * @property DriverTool[] $driverTools
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
            [['name'], 'integer'],
            [['description'], 'string'],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverTools()
    {
        return $this->hasMany(\app\modules\admin\models\DriverTool::className(), ['tool_id' => 'id']);
    }
}
