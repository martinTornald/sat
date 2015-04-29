<?php

namespace app\modules\admin\models\base;

use Yii;

/**
 * This is the base-model class for table "rate".
 *
 * @property integer $voyage_id
 * @property double $prepayment
 * @property double $payment
 * @property double $debt
 *
 * @property Voyage $voyage
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voyage_id'], 'required'],
            [['voyage_id'], 'integer'],
            [['prepayment', 'payment', 'debt'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'voyage_id' => Yii::t('app', 'Перевозка'),
            'prepayment' => Yii::t('app', 'Предоплата'),
            'payment' => Yii::t('app', 'Оплата'),
            'debt' => Yii::t('app', 'Задолженность'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoyage()
    {
        return $this->hasOne(\app\modules\admin\models\Voyage::className(), ['id' => 'voyage_id']);
    }
}
