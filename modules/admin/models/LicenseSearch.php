<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\License;

/**
 * LicenseSearch represents the model behind the search form about License.
 */
class LicenseSearch extends Model
{
	public $driver_id;
	public $number;
	public $type;
	public $description;
	public $date_of_issue;
	public $term;

	public function rules()
	{
		return [
			[['driver_id'], 'integer'],
			[['number', 'type', 'description', 'date_of_issue', 'term'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'driver_id' => 'Driver ID',
			'number' => 'Номер',
			'type' => 'Категории',
			'description' => 'Description',
			'date_of_issue' => 'Дата выдачи',
			'term' => 'Срок выдачи',
		];
	}

	public function search($params)
	{
		$query = License::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'driver_id' => $this->driver_id,
            'date_of_issue' => $this->date_of_issue,
            'term' => $this->term,
        ]);

		$query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'type', $this->type])
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
