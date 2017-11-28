<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Identitas;

/**
 * IdentitasSearch represents the model behind the search form about `app\models\Identitas`.
 */
class IdentitasSearch extends Identitas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'member', 'member_sosial_media'], 'integer'],
            [['nama_depan', 'nama_belakang', 'alamat', 'kode_pos', 'Kecamatan', 'kota', 'profinsi', 'jk', 'perusahaan', 'ringkasan', 'info_utama', 'telepon', 'no_hp', 'website', 'foto', 'status_verifikasi'], 'safe'],
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
        $query = Identitas::find();

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
            'member' => $this->member,
            'member_sosial_media' => $this->member_sosial_media,
        ]);

        $query->andFilterWhere(['like', 'nama_depan', $this->nama_depan])
            ->andFilterWhere(['like', 'nama_belakang', $this->nama_belakang])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'Kecamatan', $this->Kecamatan])
            ->andFilterWhere(['like', 'kota', $this->kota])
            ->andFilterWhere(['like', 'profinsi', $this->profinsi])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'perusahaan', $this->perusahaan])
            ->andFilterWhere(['like', 'ringkasan', $this->ringkasan])
            ->andFilterWhere(['like', 'info_utama', $this->info_utama])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'status_verifikasi', $this->status_verifikasi]);

        return $dataProvider;
    }
}
