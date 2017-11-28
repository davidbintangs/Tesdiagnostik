<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IdentitasMenawarProyek;

/**
 * IdentitasMenawarProyekSearch represents the model behind the search form about `app\models\IdentitasMenawarProyek`.
 */
class IdentitasMenawarProyekSearch extends IdentitasMenawarProyek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'identitas', 'proyek'], 'integer'],
            [['dana', 'pesan', 'file', 'created_at', 'waktu'], 'safe'],
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
        $query = IdentitasMenawarProyek::find();

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
            'proyek' => $this->proyek,
            'waktu' => $this->waktu,
        ]);

        $query->andFilterWhere(['like', 'dana', $this->dana])
            ->andFilterWhere(['like', 'pesan', $this->pesan])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}
