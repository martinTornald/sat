<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Unloading;

/**
 * UnloadingSearch represents the model behind the search form about Unloading.
 */
class UnloadingSearch extends Model
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
			'voyage_id' => 'Voyage ID',
			'place' => 'Место разгрузки',
			'plan' => 'Ожидаемая дата разгрузки',
			'fact' => 'Фактическая дата разгрузки',
		];
	}

	public function search($params)
	{
		$query = Unloading::find();
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
