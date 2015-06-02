<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\VoyageDistance;

/**
* VoyageDistanceSearch represents the model behind the search form about `app\modules\admin\models\VoyageDistance`.
*/
class VoyageDistanceSearch extends VoyageDistance
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'voyage_id', 'is_tent'], 'integer'],
            [['distance'], 'number'],
            [['date'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = VoyageDistance::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'voyage_id' => $this->voyage_id,
            'is_tent' => $this->is_tent,
            'distance' => $this->distance,
            'date' => $this->date,
        ]);

return $dataProvider;
}
}