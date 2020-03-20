<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bid;

/**
 * BidSearch represents the model behind the search form of `backend\models\Bid`.
 */
class BidSearch extends Bid
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'filial_id', 'currency_id', 'bid_status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name_ru', 'name_uz'], 'safe'],
            [['max_cost'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Bid::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'filial_id' => $this->filial_id,
            'max_cost' => $this->max_cost,
            'currency_id' => $this->currency_id,
            'bid_status' => $this->bid_status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_uz', $this->name_uz]);

        return $dataProvider;
    }
}
