<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\VoyageSparePath;

/**
 * VoyageSparePathSearch represents the model behind the search form about VoyageSparePath.
 */
class VoyageSparePathSearch extends Model
{
	public $voyage_id;
	public $spare_part_id;

	public function rules()
	{
		return [
			[['voyage_id', 'spare_part_id'], 'integer'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'voyage_id' => 'Voyage ID',
			'spare_part_id' => 'Spare Part ID',
		];
	}

	public function search($params)
	{
		$query = VoyageSparePath::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'voyage_id' => $this->voyage_id,
            'spare_part_id' => $this->spare_part_id,
        ]);

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
