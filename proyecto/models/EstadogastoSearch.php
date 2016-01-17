<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estadogasto;

/**
 * EstadogastoSearch represents the model behind the search form about `app\models\Estadogasto`.
 */
class EstadogastoSearch extends Estadogasto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ESTADO_GASTO'], 'integer'],
            [['ESTADO_GASTO'], 'safe'],
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
        $query = Estadogasto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID_ESTADO_GASTO' => $this->ID_ESTADO_GASTO,
        ]);

        $query->andFilterWhere(['like', 'ESTADO_GASTO', $this->ESTADO_GASTO]);

        return $dataProvider;
    }
}
