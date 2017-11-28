<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KategoriBudget;

/**
 * KategoriBudgetSearch represents the model behind the search form about `app\models\KategoriBudget`.
 */
class KategoriBudgetSearch extends KategoriBudget
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'poin'], 'integer'],
            [['nama_kategori', 'jumlah_budget'], 'safe'],
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
        $query = KategoriBudget::find();

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
            'poin' => $this->poin,
        ]);

        $query->andFilterWhere(['like', 'nama_kategori', $this->nama_kategori])
            ->andFilterWhere(['like', 'jumlah_budget', $this->jumlah_budget]);

        return $dataProvider;
    }
}
