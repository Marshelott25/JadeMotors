<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JmPersonal;

/**
 * JmPersonalSearch represents the model behind the search form of `app\models\JmPersonal`.
 */
class JmPersonalSearch extends JmPersonal
{

    public $ejemplo;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['per_id', 'per_telefono', 'per_fkuser'], 'integer'],
            [['per_nombre', 'per_apellidopaterno', 'per_apellidomaterno', 'per_domicilio', 'per_fechanacimiento', 'per_rfc', 'per_correo'], 'safe'],
            [['ejemplo'], 'safe'],
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
        $query = JmPersonal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider -> setSort([
                'attributes' => [
                    'ejemplo' => [
                        'asc'      => ['per_nombre' => SORT_ASC],
                        'desc'     => ['per_nombre' => SORT_ASC],
                        'default'  => SORT_ASC
                    ],
                ]
            ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'per_id' => $this->per_id,
            'per_fechanacimiento' => $this->per_fechanacimiento,
            'per_telefono' => $this->per_telefono,
            'per_fkuser' => $this->per_fkuser,
        ]);

        $query->andFilterWhere(['like', 'per_nombre', $this->per_nombre])
            ->andFilterWhere(['like', 'per_apellidopaterno', $this->per_apellidopaterno])
            ->andFilterWhere(['like', 'per_apellidomaterno', $this->per_apellidomaterno])
            ->andFilterWhere(['like', 'per_domicilio', $this->per_domicilio])
            ->andFilterWhere(['like', 'per_rfc', $this->per_rfc])
            ->andFilterWhere(['like', 'per_correo', $this->per_correo])
            ->andFilterWhere(['like', "SUBSTRING(per_nombre,1,(LOCATE(' ', per_nombre)))", $this->ejemplo]);

        return $dataProvider;
    }
}
