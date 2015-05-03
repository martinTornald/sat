<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Rate;

/**
 * RateSearch represents the model behind the search form about Rate.
 */
class RateSearch extends Model
{
	public $voyage_id;
	public $prepayment;
	public $payment;
	public $debt;

	public function rules()
	{
		return [
			[['voyage_id'], 'integer'],
			[['prepayment', 'payment', 'debt'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'voyage_id' => 'Перевозка',
			'prepayment' => 'Предоплата',
			'payment' => 'Оплата',
			'debt' => 'Задолженность',
		];
	}

	public function search($params)
	{
		$query = Rate::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'voyage_id' => $this->voyage_id,
            'prepayment' => $this->prepayment,
            'payment' => $this->payment,
            'debt' => $this->debt,
        ]);

		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
