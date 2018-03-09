<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'question_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'picture_question_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture_question_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'option_a')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'option_b')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'option_c')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'option_d')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'option_e')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'picture_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture_c')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture_d')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture_e')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer_question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reason_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reason_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reason_3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reason_4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reason_5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'answer_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'misconceptions_a')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'misconceptions_b')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'misconceptions_c')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'misconceptions_d')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'misconceptions_e')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'misconceptions_f')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'test')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
