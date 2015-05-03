<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\SparePart;

/**
 * SparePartSearch represents the model behind the search form about SparePart.
 */
class SparePartSearch extends Model
{
	public $voyage_id;
	public $plan;
	public $name;
	public $price;

	public function rules()
	{
		return [
			[['voyage_id', 'plan'], 'integer'],
			[['name'], 'safe'],
			[['price'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'voyage_id' => 'Перевозка',
			'plan' => 'Запланированная деталь',
			'name' => 'Наименование',
			'price' => 'Цена',
		];
	}

	public function search($params)
	{
		$query = SparePart::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'voyage_id' => $this->voyage_id,
            'plan' => $this->plan,
            'price' => $this->price,
        ]);

		$query->andFilterWhere(['like', 'name', $this->name]);

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
