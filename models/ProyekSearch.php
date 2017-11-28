<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proyek;
use app\models\Keahlian;
use app\models\Identitas;
use app\models\KeahlianProyek;

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
            [['id', 'created_at', 'updated_at', 'rating_proyek', 'kategori_budget'], 'integer'],
            [['judul', 'gambar', 'keterangan', 'status', 'deadline', 'konfirmasi_pekerjaan'], 'safe'],
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
    public function pekerjaan($pembuat)
    {
        $query=Yii::$app->db->createCommand('SELECT proyek.id,
            proyek.judul,
            proyek.gambar,
            proyek.keterangan,
            proyek.created_at,
            proyek.updated_at,
            proyek.`status`,
            proyek.deadline,
            proyek.rating_proyek,
            proyek.konfirmasi_pekerjaan,
            proyek.kategori_budget,
            proyek.identitas
            FROM
            proyek
            INNER JOIN identitas_mengerjakan_proyek ON identitas_mengerjakan_proyek.proyek = proyek.id
            WHERE
            identitas_mengerjakan_proyek.identitas ='.$pembuat)
            ->queryAll();
    
        return $query;
    }





    public function search($params, $pembuat)
    {
        $identitas= new Identitas();
        $id=$identitas->getId();

        if (empty($pembuat)) {
            $query = Proyek::find()->where('proyek.identitas !='.$id)->orderBy(['id'=>SORT_DESC]);    
        }else{
            $query = Proyek::find()->where(['identitas'=>$pembuat])->orderBy(['id'=>SORT_DESC]);
        }
        
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deadline' => $this->deadline,
            'rating_proyek' => $this->rating_proyek,
            'kategori_budget' => $this->kategori_budget,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'konfirmasi_pekerjaan', $this->konfirmasi_pekerjaan]);

        return $dataProvider;
    }


public function keahlian($params)
    {
        $identitas= new Identitas();
        $id=$identitas->getId();
        $keahlian =new keahlian();
        $pilKeahlian = $keahlian->getPilKeahlian($id);
        $i=0;
        foreach ($pilKeahlian as $pilKeahlian) {
            $Getkeahlian[$i]=$pilKeahlian['id'];
            $i++;
        }
      //$humba=['1','3'];
      $query = Proyek::find()
                ->leftJoin('keahlian_proyek', 'proyek.id = keahlian_proyek.proyek')
                ->where(['keahlian_proyek.keahlian'=>['1','2','3','4']])
                ->Andwhere('proyek.identitas !='.$id)
                ->orderBy(['id'=>SORT_DESC]);
       

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deadline' => $this->deadline,
            'rating_proyek' => $this->rating_proyek,
            'kategori_budget' => $this->kategori_budget,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'gambar', $this->gambar])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'konfirmasi_pekerjaan', $this->konfirmasi_pekerjaan]);

        return $dataProvider;
    }
}
