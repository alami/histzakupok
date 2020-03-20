<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Protocol;

/**
 * ProtocolSearch represents the model behind the search form of `backend\models\Protocol`.
 */
class ProtocolSearch extends Protocol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bid_id', 'currency_id', 'org_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['number', 'date'], 'safe'],
            [['cost'], 'number'],
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
        $query = Protocol::find();

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
            'bid_id' => $this->bid_id,
            'date' => $this->date,
            'cost' => $this->cost,
            'currency_id' => $this->currency_id,
            'org_id' => $this->org_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }
}
