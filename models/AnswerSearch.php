<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Answer;

/**
 * AnswerSearch represents the model behind the search form about `app\models\Answer`.
 */
class AnswerSearch extends Answer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'understand', 'not_understand_concept', 'misconceptions', 'error', 'test', 'member'], 'integer'],
            [['date', 'grade', 'status', 'asnwer_question', 'answer_confidence1', 'answer_reason', 'answer_confidence2', 'number_understand', 'number_not_understand_concept', 'number_misconceptions', 'number_error'], 'safe'],
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
        $query = Answer::find();

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
            'date' => $this->date,
            'understand' => $this->understand,
            'not_understand_concept' => $this->not_understand_concept,
            'misconceptions' => $this->misconceptions,
            'error' => $this->error,
            'test' => $this->test,
            'member' => $this->member,
        ]);

        $query->andFilterWhere(['like', 'grade', $this->grade])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'asnwer_question', $this->asnwer_question])
            ->andFilterWhere(['like', 'answer_confidence1', $this->answer_confidence1])
            ->andFilterWhere(['like', 'answer_reason', $this->answer_reason])
            ->andFilterWhere(['like', 'answer_confidence2', $this->answer_confidence2])
            ->andFilterWhere(['like', 'number_understand', $this->number_understand])
            ->andFilterWhere(['like', 'number_not_understand_concept', $this->number_not_understand_concept])
            ->andFilterWhere(['like', 'number_misconceptions', $this->number_misconceptions])
            ->andFilterWhere(['like', 'number_error', $this->number_error]);

        return $dataProvider;
    }
}
