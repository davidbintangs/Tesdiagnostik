<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Answer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'asnwer_question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer_confidence1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer_reason')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer_confidence2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'understand')->textInput() ?>

    <?= $form->field($model, 'not_understand_concept')->textInput() ?>

    <?= $form->field($model, 'misconceptions')->textInput() ?>

    <?= $form->field($model, 'error')->textInput() ?>

    <?= $form->field($model, 'number_understand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_not_understand_concept')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_misconceptions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'test')->textInput() ?>

    <?= $form->field($model, 'member')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
