<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "stat_inaction".
 *
 * @property integer $id
 * @property integer $stat_id
 * @property integer $driver_id
 * @property double $inaction
 *
 * @property \app\modules\admin\models\Stat $driver
 * @property \app\modules\admin\models\Stat $stat
 */
class StatInaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stat_inaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stat_id', 'driver_id'], 'required'],
            [['stat_id', 'driver_id'], 'integer'],
            [['inaction'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stat_id' => 'Stat ID',
            'driver_id' => 'Driver ID',
            'inaction' => 'Inaction',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(\app\modules\admin\models\Stat::className(), ['id' => 'driver_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStat()
    {
        return $this->hasOne(\app\modules\admin\models\Stat::className(), ['id' => 'stat_id']);
    }
}
