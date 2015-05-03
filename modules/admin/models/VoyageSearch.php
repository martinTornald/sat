<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Voyage;

/**
 * VoyageSearch represents the model behind the search form about Voyage.
 */
class VoyageSearch extends Model
{
	public $id;
	public $customer_id;
	public $car_id;
	public $trailer_id;
	public $driver_id;
	public $status_id;
	public $name;
	public $description;
	public $updated;
	public $created_at;

	public function rules()
	{
		return [
			[['id', 'customer_id', 'car_id', 'trailer_id', 'driver_id', 'status_id'], 'integer'],
			[['name', 'description', 'updated', 'created_at'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'customer_id' => 'Заказчик',
			'car_id' => 'Машина',
			'trailer_id' => 'Прицеп',
			'driver_id' => 'Водитель',
			'status_id' => 'Статус',
			'name' => 'Название перевозки',
			'description' => 'Описание перевозки',
			'updated' => 'Дата обновления',
			'created_at' => 'Дата создания',
		];
	}

	public function search($params)
	{
		$query = Voyage::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'car_id' => $this->car_id,
            'trailer_id' => $this->trailer_id,
            'driver_id' => $this->driver_id,
            'status_id' => $this->status_id,
            'updated' => $this->updated,
            'created_at' => $this->created_at,
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
