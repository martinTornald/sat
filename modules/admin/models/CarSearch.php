<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Car;

/**
 * CarSearch represents the model behind the search form about Car.
 */
class CarSearch extends Model
{
	public $id;
	public $owner_id;
	public $insurance_id;
	public $make_model;
	public $number;
	public $color;
	public $year;
	public $reg_number;
	public $reg_certificate;
	public $mileage;
	public $photo;
	public $cost;

	public function rules()
	{
		return [
			[['id', 'owner_id', 'insurance_id', 'mileage'], 'integer'],
			[['make_model', 'number', 'color', 'year', 'reg_number', 'reg_certificate', 'photo'], 'safe'],
			[['cost'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'owner_id' => 'Владельц',
			'insurance_id' => 'Страховка',
			'make_model' => 'Модель',
			'number' => 'Номер',
			'color' => 'Цвет',
			'year' => 'Год выпуска',
			'reg_number' => 'Регистрационный номер',
			'reg_certificate' => 'Регистрационный сертификат',
			'mileage' => 'Пробег',
			'photo' => 'Фото',
			'cost' => 'Стоимость',
		];
	}

	public function search($params)
	{
		$query = Car::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'owner_id' => $this->owner_id,
            'insurance_id' => $this->insurance_id,
            'year' => $this->year,
            'mileage' => $this->mileage,
            'cost' => $this->cost,
        ]);

		$query->andFilterWhere(['like', 'make_model', $this->make_model])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'reg_number', $this->reg_number])
            ->andFilterWhere(['like', 'reg_certificate', $this->reg_certificate])
            ->andFilterWhere(['like', 'photo', $this->photo]);

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
