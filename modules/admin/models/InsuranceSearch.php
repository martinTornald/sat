<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Insurance;

/**
 * InsuranceSearch represents the model behind the search form about Insurance.
 */
class InsuranceSearch extends Model
{
	public $car_id;
	public $name;
	public $createdAt;
	public $term;
	public $description;

	public function rules()
	{
		return [
			[['car_id'], 'integer'],
			[['name', 'createdAt', 'term', 'description'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'car_id' => 'Car ID',
			'name' => 'Наименование',
			'createdAt' => 'Дата выдачи',
			'term' => 'Срок действия',
			'description' => 'Описание',
		];
	}

	public function search($params)
	{
		$query = Insurance::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'car_id' => $this->car_id,
            'createdAt' => $this->createdAt,
            'term' => $this->term,
        ]);

		$query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

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
