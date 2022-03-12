<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JmVenta;

/**
 * JmVentaSearch represents the model behind the search form of `app\models\JmVenta`.
 */
class JmVentaSearch extends JmVenta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ven_id', 'ven_pedidonumero', 'ven_fkcliente', 'ven_fkvendedor'], 'integer'],
            [['ven_fecha', 'ven_estatus'], 'safe'],
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
        $query = JmVenta::find();

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
            'ven_id' => $this->ven_id,
            'ven_fecha' => $this->ven_fecha,
            'ven_pedidonumero' => $this->ven_pedidonumero,
            'ven_fkcliente' => $this->ven_fkcliente,
            'ven_fkvendedor' => $this->ven_fkvendedor,
        ]);

        $query->andFilterWhere(['like', 'ven_estatus', $this->ven_estatus]);

        return $dataProvider;
    }
}
