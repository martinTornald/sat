<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Owner;

/**
 * OwnerSearch represents the model behind the search form about Owner.
 */
class OwnerSearch extends Model
{
	public $id;
	public $passport;
	public $surname;
	public $name;
	public $patronymic;
	public $phone;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['passport', 'surname', 'name', 'patronymic', 'phone'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'passport' => 'Паспорт',
			'surname' => 'Фамилия',
			'name' => 'Имя',
			'patronymic' => 'Отчество',
			'phone' => 'Телефон',
		];
	}

	public function search($params)
	{
		$query = Owner::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
        ]);

		$query->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'phone', $this->phone]);

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
