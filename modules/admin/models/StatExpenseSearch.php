<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\StatExpense;

/**
* StatExpenseSearch represents the model behind the search form about `app\modules\admin\models\StatExpense`.
*/
class StatExpenseSearch extends StatExpense
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['stat_id'], 'integer'],
            [['fuel', 'salary', 'transport_cost'], 'number'],
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
$query = StatExpense::find();

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
            'stat_id' => $this->stat_id,
            'fuel' => $this->fuel,
            'salary' => $this->salary,
            'transport_cost' => $this->transport_cost,
        ]);

return $dataProvider;
}
}