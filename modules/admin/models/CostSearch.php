<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Cost;

/**
 * CostSearch represents the model behind the search form about Cost.
 */
class CostSearch extends Model
{
	public $voyage_id;
	public $plan;
	public $fact;

	public function rules()
	{
		return [
			[['voyage_id'], 'integer'],
			[['plan', 'fact'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'voyage_id' => 'Перевозка',
			'plan' => 'Планируемая стоимость',
			'fact' => 'Фактическая стоимость',
		];
	}

	public function search($params)
	{
		$query = Cost::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'voyage_id' => $this->voyage_id,
            'plan' => $this->plan,
            'fact' => $this->fact,
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
