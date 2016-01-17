<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ROL;

/**
 * ROLSearch represents the model behind the search form about `app\models\ROL`.
 */
class ROLSearch extends ROL
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_ROL'], 'integer'],
            [['ROL'], 'safe'],
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
        $query = ROL::find();

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
            'ID_ROL' => $this->ID_ROL,
        ]);

        $query->andFilterWhere(['like', 'ROL', $this->ROL]);

        return $dataProvider;
    }
}
