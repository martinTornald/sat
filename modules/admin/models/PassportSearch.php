<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Passport;

/**
 * PassportSearch represents the model behind the search form about Passport.
 */
class PassportSearch extends Model
{
	public $id;
	public $number;
	public $date;
	public $issued;

	public function rules()
	{
		return [
			[['id', 'number'], 'integer'],
			[['date', 'issued'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'number' => 'Серия и номер паспорта',
			'date' => 'Дата выдачи паспорта',
			'issued' => 'Кем и когда выдан паспорт',
		];
	}

	public function search($params)
	{
		$query = Passport::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'number' => $this->number,
            'date' => $this->date,
        ]);

		$query->andFilterWhere(['like', 'issued', $this->issued]);

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
