<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Income;

/**
 * IncomeSearch represents the model behind the search form about Income.
 */
class IncomeSearch extends Model
{
	public $voyage_id;
	public $fact;

	public function rules()
	{
		return [
			[['voyage_id'], 'integer'],
			[['fact'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'voyage_id' => 'Voyage ID',
			'fact' => 'Fact',
		];
	}

	public function search($params)
	{
		$query = Income::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'voyage_id' => $this->voyage_id,
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
