<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengalaman;

/**
 * PengalamanSearch represents the model behind the search form about `app\models\Pengalaman`.
 */
class PengalamanSearch extends Pengalaman
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'identitas'], 'integer'],
            [['judul', 'perusahaan', 'bulan_mulai', 'tahun_mulai', 'status_keaktifan', 'bulan_selesai', 'tahun_selesai', 'ringkasan'], 'safe'],
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
        $profil=Yii::$app->user->identity->id ;
        $id=Yii::$app->db->createCommand('SELECT identitas.id FROM identitas INNER JOIN member ON identitas.member = member.id WHERE identitas.member= ' .$profil)
            ->queryOne();

        $query = Pengalaman::find()->where(['identitas'=>$id]);

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
            'identitas' => $this->identitas,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'perusahaan', $this->perusahaan])
            ->andFilterWhere(['like', 'bulan_mulai', $this->bulan_mulai])
            ->andFilterWhere(['like', 'tahun_mulai', $this->tahun_mulai])
            ->andFilterWhere(['like', 'status_keaktifan', $this->status_keaktifan])
            ->andFilterWhere(['like', 'bulan_selesai', $this->bulan_selesai])
            ->andFilterWhere(['like', 'tahun_selesai', $this->tahun_selesai])
            ->andFilterWhere(['like', 'ringkasan', $this->ringkasan]);

        return $dataProvider;
    }

        public function member($params,$id)
    {
        

        $query = Pengalaman::find()->where(['identitas'=>$id]);

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
            'identitas' => $this->identitas,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'perusahaan', $this->perusahaan])
            ->andFilterWhere(['like', 'bulan_mulai', $this->bulan_mulai])
            ->andFilterWhere(['like', 'tahun_mulai', $this->tahun_mulai])
            ->andFilterWhere(['like', 'status_keaktifan', $this->status_keaktifan])
            ->andFilterWhere(['like', 'bulan_selesai', $this->bulan_selesai])
            ->andFilterWhere(['like', 'tahun_selesai', $this->tahun_selesai])
            ->andFilterWhere(['like', 'ringkasan', $this->ringkasan]);

        return $dataProvider;
    }
}
