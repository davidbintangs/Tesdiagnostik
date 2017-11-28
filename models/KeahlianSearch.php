<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Keahlian;

/**
 * KeahlianSearch represents the model behind the search form about `app\models\Keahlian`.
 */
class KeahlianSearch extends Keahlian
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Jenis_keahlian', 'total_proyek'], 'integer'],
            [['nama_keahlian'], 'safe'],
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
        $query = Keahlian::find();

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
            'Jenis_keahlian' => $this->Jenis_keahlian,
            'total_proyek' => $this->total_proyek,
        ]);

        $query->andFilterWhere(['like', 'nama_keahlian', $this->nama_keahlian]);

        return $dataProvider;
    }
}
