<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Stat;

/**
* StatSearch represents the model behind the search form about `app\modules\admin\models\Stat`.
*/
class StatSearch extends Stat
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'car_id'], 'integer'],
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
$query = Stat::find();

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
            'car_id' => $this->car_id,
            'date' => $this->date,
        ]);

return $dataProvider;
}
}