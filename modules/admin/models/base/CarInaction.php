<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "car_inaction".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $voyage_prev
 * @property integer $voyage_next
 *
 * @property Voyage $voyageNext
 * @property Car $car
 * @property Voyage $voyagePrev
 */
class CarInaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_inaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id'], 'required'],
            [['car_id', 'voyage_prev', 'voyage_next'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'car_id' => Yii::t('app', 'Машина'),
            'voyage_prev' => Yii::t('app', 'Предыдущая поездка'),
            'voyage_next' => Yii::t('app', 'Следующая'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyageNext()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_next']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(\app\modules\admin\models\Car::className(), ['id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyagePrev()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_prev']);
    }
}
