<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pendidikan;

/**
 * PendidikanSearch represents the model behind the search form about `app\models\Pendidikan`.
 */
class PendidikanSearch extends Pendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'identitas'], 'integer'],
            [['bidang', 'instansi', 'tahun_masuk', 'status_keaktifan', 'tahun_keluar'], 'safe'],
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
        $query = Pendidikan::find()->where(['identitas'=>$id]);

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

        $query->andFilterWhere(['like', 'bidang', $this->bidang])
            ->andFilterWhere(['like', 'instansi', $this->instansi])
            ->andFilterWhere(['like', 'tahun_masuk', $this->tahun_masuk])
            ->andFilterWhere(['like', 'status_keaktifan', $this->status_keaktifan])
            ->andFilterWhere(['like', 'tahun_keluar', $this->tahun_keluar]);

        return $dataProvider;
    }

    public function member($params,$id)
    {
        
        $query = Pendidikan::find()->where(['identitas'=>$id]);

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

        $query->andFilterWhere(['like', 'bidang', $this->bidang])
            ->andFilterWhere(['like', 'instansi', $this->instansi])
            ->andFilterWhere(['like', 'tahun_masuk', $this->tahun_masuk])
            ->andFilterWhere(['like', 'status_keaktifan', $this->status_keaktifan])
            ->andFilterWhere(['like', 'tahun_keluar', $this->tahun_keluar]);

        return $dataProvider;
    }
}
