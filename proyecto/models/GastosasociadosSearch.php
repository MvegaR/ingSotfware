<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gastosasociados;

/**
 * GastosasociadosSearch represents the model behind the search form about `app\models\Gastosasociados`.
 */
class GastosasociadosSearch extends Gastosasociados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_GASTO_ASOCIADO', 'ID_TIPO_DE_VIAJE'], 'integer'],
            [['NOMBRE_GASTO_ASOCIADO'], 'safe'],
            [['MONTO_GASTO_ASOCIADO'], 'number'],
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
        $query = Gastosasociados::find();

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
            'ID_GASTO_ASOCIADO' => $this->ID_GASTO_ASOCIADO,
            'ID_TIPO_DE_VIAJE' => $this->ID_TIPO_DE_VIAJE,
            'MONTO_GASTO_ASOCIADO' => $this->MONTO_GASTO_ASOCIADO,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE_GASTO_ASOCIADO', $this->NOMBRE_GASTO_ASOCIADO]);

        return $dataProvider;
    }
}
