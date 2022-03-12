<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JmModelo;

/**
 * JmModeloSearch represents the model behind the search form of `app\models\JmModelo`.
 */
class JmModeloSearch extends JmModelo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mod_id', 'mod_fkmarca', 'mod_fkvehiculo'], 'integer'],
            [['mod_nombre'], 'safe'],
            [['mod_precio'], 'number'],
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
        $query = JmModelo::find();

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
            'mod_id' => $this->mod_id,
            'mod_precio' => $this->mod_precio,
            'mod_fkmarca' => $this->mod_fkmarca,
            'mod_fkvehiculo' => $this->mod_fkvehiculo,
        ]);

        $query->andFilterWhere(['like', 'mod_nombre', $this->mod_nombre]);

        return $dataProvider;
    }
}
