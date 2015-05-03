<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\DriverTool;

/**
 * DriverToolSearch represents the model behind the search form about DriverTool.
 */
class DriverToolSearch extends Model
{
	public $id;
	public $driver_id;
	public $tool_id;
	public $date_of_issue;
	public $date_delivery;
	public $description;

	public function rules()
	{
		return [
			[['id', 'driver_id', 'tool_id'], 'integer'],
			[['date_of_issue', 'date_delivery', 'description'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'driver_id' => 'Driver ID',
			'tool_id' => 'Tool ID',
			'date_of_issue' => 'Date Of Issue',
			'date_delivery' => 'Date Delivery',
			'description' => 'Description',
		];
	}

	public function search($params)
	{
		$query = DriverTool::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'driver_id' => $this->driver_id,
            'tool_id' => $this->tool_id,
            'date_of_issue' => $this->date_of_issue,
            'date_delivery' => $this->date_delivery,
        ]);

		$query->andFilterWhere(['like', 'description', $this->description]);

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
