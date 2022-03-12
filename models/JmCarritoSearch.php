<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JmCarrito;

/**
 * JmCarritoSearch represents the model behind the search form of `app\models\JmCarrito`.
 */
class JmCarritoSearch extends JmCarrito
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'car_cantidad', 'car_fkmodelo', 'car_fkventa'], 'integer'],
            [['car_descripcion'], 'safe'],
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
        $query = JmCarrito::find();

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
            'car_id' => $this->car_id,
            'car_cantidad' => $this->car_cantidad,
            'car_fkmodelo' => $this->car_fkmodelo,
            'car_fkventa' => $this->car_fkventa,
        ]);

        $query->andFilterWhere(['like', 'car_descripcion', $this->car_descripcion]);

        return $dataProvider;
    }
}
