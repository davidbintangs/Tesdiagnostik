<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $question_1
 * @property string $question_2
 * @property string $picture_question_1
 * @property string $picture_question_2
 * @property string $option_a
 * @property string $option_b
 * @property string $option_c
 * @property string $option_d
 * @property string $option_e
 * @property string $picture_a
 * @property string $picture_b
 * @property string $picture_c
 * @property string $picture_d
 * @property string $picture_e
 * @property string $answer_question
 * @property string $reason_1
 * @property string $reason_2
 * @property string $reason_3
 * @property string $reason_4
 * @property string $reason_5
 * @property string $answer_reason
 * @property string $misconceptions_a
 * @property string $misconceptions_b
 * @property string $misconceptions_c
 * @property string $misconceptions_d
 * @property string $misconceptions_e
 * @property string $misconceptions_f
 * @property string $status
 * @property integer $test
 *
 * @property Test $test0
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_1', 'question_2', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'reason_1', 'reason_2', 'reason_3', 'reason_4', 'reason_5', 'misconceptions_a', 'misconceptions_b', 'misconceptions_c', 'misconceptions_d', 'misconceptions_e', 'misconceptions_f'], 'string'],
            [['test'], 'integer'],
            [['picture_question_1', 'picture_a', 'picture_b', 'picture_c', 'picture_d', 'picture_e'], 'string', 'max' => 50],
            [['picture_question_2', 'answer_reason', 'status'], 'string', 'max' => 255],
            [['answer_question'], 'string', 'max' => 11],
            [['test'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['test' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question_1' => Yii::t('app', 'Question 1'),
            'question_2' => Yii::t('app', 'Question 2'),
            'picture_question_1' => Yii::t('app', 'Picture Question 1'),
            'picture_question_2' => Yii::t('app', 'Picture Question 2'),
            'option_a' => Yii::t('app', 'Option A'),
            'option_b' => Yii::t('app', 'Option B'),
            'option_c' => Yii::t('app', 'Option C'),
            'option_d' => Yii::t('app', 'Option D'),
            'option_e' => Yii::t('app', 'Option E'),
            'picture_a' => Yii::t('app', 'Picture A'),
            'picture_b' => Yii::t('app', 'Picture B'),
            'picture_c' => Yii::t('app', 'Picture C'),
            'picture_d' => Yii::t('app', 'Picture D'),
            'picture_e' => Yii::t('app', 'Picture E'),
            'answer_question' => Yii::t('app', 'Answer Question'),
            'reason_1' => Yii::t('app', 'Reason 1'),
            'reason_2' => Yii::t('app', 'Reason 2'),
            'reason_3' => Yii::t('app', 'Reason 3'),
            'reason_4' => Yii::t('app', 'Reason 4'),
            'reason_5' => Yii::t('app', 'Reason 5'),
            'answer_reason' => Yii::t('app', 'Answer Reason'),
            'misconceptions_a' => Yii::t('app', 'Misconceptions A'),
            'misconceptions_b' => Yii::t('app', 'Misconceptions B'),
            'misconceptions_c' => Yii::t('app', 'Misconceptions C'),
            'misconceptions_d' => Yii::t('app', 'Misconceptions D'),
            'misconceptions_e' => Yii::t('app', 'Misconceptions E'),
            'misconceptions_f' => Yii::t('app', 'Misconceptions F'),
            'status' => Yii::t('app', 'Status'),
            'test' => Yii::t('app', 'Test'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest0()
    {
        return $this->hasOne(Test::className(), ['id' => 'test']);
    }
}
