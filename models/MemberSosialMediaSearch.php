<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MemberSosialMedia;

/**
 * MemberSosialMediaSearch represents the model behind the search form about `app\models\MemberSosialMedia`.
 */
class MemberSosialMediaSearch extends MemberSosialMedia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sosial_media', 'id', 'username'], 'safe'],
            [['member_id', 'created_at', 'updated_at'], 'integer'],
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
        $query = MemberSosialMedia::find();

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
            'member_id' => $this->member_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sosial_media', $this->sosial_media])
            ->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
