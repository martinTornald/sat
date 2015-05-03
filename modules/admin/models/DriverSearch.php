<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Driver;

/**
 * DriverSearch represents the model behind the search form about Driver.
 */
class DriverSearch extends Model
{
	public $id;
	public $passport;
	public $license;
	public $surname;
	public $name;
	public $patronymic;
	public $address;
	public $phone;

	public function rules()
	{
		return [
			[['id'], 'integer'],
			[['passport', 'license', 'surname', 'name', 'patronymic', 'address', 'phone'], 'safe'],
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
			'license' => 'Лицензия',
			'surname' => 'Фамилия',
			'name' => 'Имя',
			'patronymic' => 'Отчество',
			'address' => 'Адрес',
			'phone' => 'Телефон',
		];
	}

	public function search($params)
	{
		$query = Driver::find();
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
            ->andFilterWhere(['like', 'license', $this->license])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'address', $this->address])
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
