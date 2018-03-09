<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property integer $id
 * @property string $date
 * @property string $grade
 * @property string $status
 * @property string $asnwer_question
 * @property string $answer_confidence1
 * @property string $answer_reason
 * @property string $answer_confidence2
 * @property integer $understand
 * @property integer $not_understand_concept
 * @property integer $misconceptions
 * @property integer $error
 * @property string $number_understand
 * @property string $number_not_understand_concept
 * @property string $number_misconceptions
 * @property string $number_error
 * @property integer $test
 * @property integer $member
 *
 * @property Member $member0
 * @property Test $test0
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['asnwer_question', 'answer_confidence1', 'answer_reason'], 'string'],
            [['understand', 'not_understand_concept', 'misconceptions', 'error', 'test', 'member'], 'integer'],
            [['grade', 'status'], 'string', 'max' => 15],
            [['answer_confidence2', 'number_understand', 'number_not_understand_concept', 'number_misconceptions', 'number_error'], 'string', 'max' => 255],
            [['member'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['member' => 'id']],
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
            'date' => Yii::t('app', 'Date'),
            'grade' => Yii::t('app', 'Grade'),
            'status' => Yii::t('app', 'Status'),
            'asnwer_question' => Yii::t('app', 'Asnwer Question'),
            'answer_confidence1' => Yii::t('app', 'Answer Confidence1'),
            'answer_reason' => Yii::t('app', 'Answer Reason'),
            'answer_confidence2' => Yii::t('app', 'Answer Confidence2'),
            'understand' => Yii::t('app', 'Understand'),
            'not_understand_concept' => Yii::t('app', 'Not Understand Concept'),
            'misconceptions' => Yii::t('app', 'Misconceptions'),
            'error' => Yii::t('app', 'Error'),
            'number_understand' => Yii::t('app', 'Number Understand'),
            'number_not_understand_concept' => Yii::t('app', 'Number Not Understand Concept'),
            'number_misconceptions' => Yii::t('app', 'Number Misconceptions'),
            'number_error' => Yii::t('app', 'Number Error'),
            'test' => Yii::t('app', 'Test'),
            'member' => Yii::t('app', 'Member'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember0()
    {
        return $this->hasOne(Member::className(), ['id' => 'member']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest0()
    {
        return $this->hasOne(Test::className(), ['id' => 'test']);
    }
}
