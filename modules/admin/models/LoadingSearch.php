<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Loading;

/**
 * LoadingSearch represents the model behind the search form about Loading.
 */
class LoadingSearch extends Model
{
	public $voyage_id;
	public $place;
	public $plan;
	public $fact;

	public function rules()
	{
		return [
			[['voyage_id'], 'integer'],
			[['place', 'plan', 'fact'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'voyage_id' => 'Перевозка',
			'place' => 'Место загрузки',
			'plan' => 'Ожидаемая дата загрузки',
			'fact' => 'Фактическая дата загрузки',
		];
	}

	public function search($params)
	{
		$query = Loading::find();
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

		$query->andFilterWhere(['like', 'place', $this->place]);

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
