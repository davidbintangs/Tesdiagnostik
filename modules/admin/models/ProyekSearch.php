<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proyek;

/**
 * ProyekSearch represents the model behind the search form about `app\models\Proyek`.
 */
class ProyekSearch extends Proyek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rating_proyek', 'kategori_budget', 'identitas'], 'integer'],
            [['judul', 'gambar', 'keterangan', 'created_at', 'updated_at', 'status', 'deadline', 'konfirmasi_pekerjaan'], 'safe'],
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
        $query = Proyek::find();

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
            'deadline' => $this->deadline,
            'rating_proyek' => $this->rating_proyek,
            'kategori_budget' => $this->kategori_budget,
            'identitas' => $this->identitas,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'konfirmasi_pekerjaan', $this->konfirmasi_pekerjaan]);

        return $dataProvider;
    }
}
