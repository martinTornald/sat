<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\StatIncome;

/**
 * StatIncomeSearch represents the model behind the search form about `app\modules\admin\models\StatIncome`.
 */
class StatIncomeSearch extends StatIncome
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stat_id'], 'integer'],
            [['plan', 'fact'], 'number'],
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
        $query = StatIncome::find();

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
            'plan' => $this->plan,
            'fact' => $this->fact,
        ]);

        return $dataProvider;
    }
}