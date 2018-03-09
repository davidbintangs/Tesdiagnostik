<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AnswerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'grade') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'asnwer_question') ?>

    <?php // echo $form->field($model, 'answer_confidence1') ?>

    <?php // echo $form->field($model, 'answer_reason') ?>

    <?php // echo $form->field($model, 'answer_confidence2') ?>

    <?php // echo $form->field($model, 'understand') ?>

    <?php // echo $form->field($model, 'not_understand_concept') ?>

    <?php // echo $form->field($model, 'misconceptions') ?>

    <?php // echo $form->field($model, 'error') ?>

    <?php // echo $form->field($model, 'number_understand') ?>

    <?php // echo $form->field($model, 'number_not_understand_concept') ?>

    <?php // echo $form->field($model, 'number_misconceptions') ?>

    <?php // echo $form->field($model, 'number_error') ?>

    <?php // echo $form->field($model, 'test') ?>

    <?php // echo $form->field($model, 'member') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
