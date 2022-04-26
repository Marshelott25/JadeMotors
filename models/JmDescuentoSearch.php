<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JmDescuento;

/**
 * JmDescuentoSearch represents the model behind the search form of `app\models\JmDescuento`.
 */
class JmDescuentoSearch extends JmDescuento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['des_id', 'des_porcentaje', 'des_fkmodelo'], 'integer'],
            [['des_inicio', 'des_fin'], 'safe'],
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
        $query = JmDescuento::find();

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
            'des_id' => $this->des_id,
            'des_porcentaje' => $this->des_porcentaje,
            'des_inicio' => $this->des_inicio,
            'des_fin' => $this->des_fin,
            'des_fkmodelo' => $this->des_fkmodelo,
        ]);

        return $dataProvider;
    }
}
