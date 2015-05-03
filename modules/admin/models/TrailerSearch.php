<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Trailer;

/**
 * TrailerSearch represents the model behind the search form about Trailer.
 */
class TrailerSearch extends Model
{
	public $id;
	public $make_model;
	public $number;
	public $type;
	public $year;
	public $reg_number;
	public $reg_certificate;
	public $id_owner;
	public $photo;

	public function rules()
	{
		return [
			[['id', 'id_owner'], 'integer'],
			[['make_model', 'number', 'type', 'year', 'reg_number', 'reg_certificate', 'photo'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'make_model' => 'Модель',
			'number' => 'Номер',
			'type' => 'Тип',
			'year' => 'Год выпуска',
			'reg_number' => 'Регистрационный номер',
			'reg_certificate' => 'Регистрационный сертификат',
			'id_owner' => 'Владелец',
			'photo' => 'Фото',
		];
	}

	public function search($params)
	{
		$query = Trailer::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'id_owner' => $this->id_owner,
        ]);

		$query->andFilterWhere(['like', 'make_model', $this->make_model])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'type', $this->type])
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
