<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KeahlianIdentitas;

/**
 * KeahlianIdentitasSearch represents the model behind the search form about `app\models\KeahlianIdentitas`.
 */
class KeahlianIdentitasSearch extends KeahlianIdentitas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'keahlian', 'identitas'], 'integer'],
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
        $query = KeahlianIdentitas::find();

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
            'id' => $this->id,
            'keahlian' => $this->keahlian,
            'identitas' => $this->identitas,
        ]);

        return $dataProvider;
    }
}
