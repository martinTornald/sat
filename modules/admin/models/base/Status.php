<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "status".
 *
 * @property integer $id
 * @property integer $type
 * @property string $description
 *
 * @property Voyage[] $voyages
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'integer'],
            [['description'], 'string']
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
            'description' => Yii::t('app', 'Описание'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyages()
    {
        return $this->hasMany(\app\modules\admin\models\Voyage::className(), ['status_id' => 'id']);
    }
}
