<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JmFinanciamiento;

/**
 * JmFinanaciamientoSearch represents the model behind the search form of `app\models\JmFinanciamiento`.
 */
class JmFinanaciamientoSearch extends JmFinanciamiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fin_id', 'fin_fkcotizacion'], 'integer'],
            [['fin_financiamiento', 'fin_plazos'], 'safe'],
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
        $query = JmFinanciamiento::find();

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
            'fin_id' => $this->fin_id,
            'fin_fkcotizacion' => $this->fin_fkcotizacion,
        ]);

        $query->andFilterWhere(['like', 'fin_financiamiento', $this->fin_financiamiento])
            ->andFilterWhere(['like', 'fin_plazos', $this->fin_plazos]);

        return $dataProvider;
    }
}
