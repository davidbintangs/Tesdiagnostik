<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IdentitasMengerjakanProyek;

/**
 * IdentitasMengerjakanProyekSearch represents the model behind the search form about `app\models\IdentitasMengerjakanProyek`.
 */
class IdentitasMengerjakanProyekSearch extends IdentitasMengerjakanProyek
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'identitas', 'proyek', 'rating_pekerja'], 'integer'],
            [['jobdesk', 'status', 'feedback', 'dana', 'waktu'], 'safe'],
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
        $query = IdentitasMengerjakanProyek::find();

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
            'rating_pekerja' => $this->rating_pekerja,
            'waktu' => $this->waktu,
        ]);

        $query->andFilterWhere(['like', 'jobdesk', $this->jobdesk])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'feedback', $this->feedback])
            ->andFilterWhere(['like', 'dana', $this->dana]);

        return $dataProvider;
    }
}
