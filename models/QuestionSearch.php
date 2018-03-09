<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `app\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'test'], 'integer'],
            [['question_1', 'question_2', 'picture_question_1', 'picture_question_2', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'picture_a', 'picture_b', 'picture_c', 'picture_d', 'picture_e', 'answer_question', 'reason_1', 'reason_2', 'reason_3', 'reason_4', 'reason_5', 'answer_reason', 'misconceptions_a', 'misconceptions_b', 'misconceptions_c', 'misconceptions_d', 'misconceptions_e', 'misconceptions_f', 'status'], 'safe'],
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
        $query = Question::find();

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
            'test' => $this->test,
        ]);

        $query->andFilterWhere(['like', 'question_1', $this->question_1])
            ->andFilterWhere(['like', 'question_2', $this->question_2])
            ->andFilterWhere(['like', 'picture_question_1', $this->picture_question_1])
            ->andFilterWhere(['like', 'picture_question_2', $this->picture_question_2])
            ->andFilterWhere(['like', 'option_a', $this->option_a])
            ->andFilterWhere(['like', 'option_b', $this->option_b])
            ->andFilterWhere(['like', 'option_c', $this->option_c])
            ->andFilterWhere(['like', 'option_d', $this->option_d])
            ->andFilterWhere(['like', 'option_e', $this->option_e])
            ->andFilterWhere(['like', 'picture_a', $this->picture_a])
            ->andFilterWhere(['like', 'picture_b', $this->picture_b])
            ->andFilterWhere(['like', 'picture_c', $this->picture_c])
            ->andFilterWhere(['like', 'picture_d', $this->picture_d])
            ->andFilterWhere(['like', 'picture_e', $this->picture_e])
            ->andFilterWhere(['like', 'answer_question', $this->answer_question])
            ->andFilterWhere(['like', 'reason_1', $this->reason_1])
            ->andFilterWhere(['like', 'reason_2', $this->reason_2])
            ->andFilterWhere(['like', 'reason_3', $this->reason_3])
            ->andFilterWhere(['like', 'reason_4', $this->reason_4])
            ->andFilterWhere(['like', 'reason_5', $this->reason_5])
            ->andFilterWhere(['like', 'answer_reason', $this->answer_reason])
            ->andFilterWhere(['like', 'misconceptions_a', $this->misconceptions_a])
            ->andFilterWhere(['like', 'misconceptions_b', $this->misconceptions_b])
            ->andFilterWhere(['like', 'misconceptions_c', $this->misconceptions_c])
            ->andFilterWhere(['like', 'misconceptions_d', $this->misconceptions_d])
            ->andFilterWhere(['like', 'misconceptions_e', $this->misconceptions_e])
            ->andFilterWhere(['like', 'misconceptions_f', $this->misconceptions_f])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
