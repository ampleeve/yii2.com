<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orderproduct;

/**
 * OrderproductSearch represents the model behind the search form about `app\models\Orderproduct`.
 */
class OrderproductSearch extends Orderproduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orderID', 'productID', 'count'], 'integer'],
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
        $query = Orderproduct::find();

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
            'orderID' => $this->orderID,
            'productID' => $this->productID,
            'count' => $this->count,
        ]);

        return $dataProvider;
    }
}
