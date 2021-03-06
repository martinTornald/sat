<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\SparePart;

/**
* SparePartSearch represents the model behind the search form about `app\modules\admin\models\SparePart`.
*/
class SparePartSearch extends SparePart
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'voyage_id', 'plan'], 'integer'],
            [['name', 'date'], 'safe'],
            [['price'], 'number'],
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
$query = SparePart::find();

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
            'plan' => $this->plan,
            'price' => $this->price,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

return $dataProvider;
}
}