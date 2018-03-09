<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'question_1') ?>

    <?= $form->field($model, 'question_2') ?>

    <?= $form->field($model, 'picture_question_1') ?>

    <?= $form->field($model, 'picture_question_2') ?>

    <?php // echo $form->field($model, 'option_a') ?>

    <?php // echo $form->field($model, 'option_b') ?>

    <?php // echo $form->field($model, 'option_c') ?>

    <?php // echo $form->field($model, 'option_d') ?>

    <?php // echo $form->field($model, 'option_e') ?>

    <?php // echo $form->field($model, 'picture_a') ?>

    <?php // echo $form->field($model, 'picture_b') ?>

    <?php // echo $form->field($model, 'picture_c') ?>

    <?php // echo $form->field($model, 'picture_d') ?>

    <?php // echo $form->field($model, 'picture_e') ?>

    <?php // echo $form->field($model, 'answer_question') ?>

    <?php // echo $form->field($model, 'reason_1') ?>

    <?php // echo $form->field($model, 'reason_2') ?>

    <?php // echo $form->field($model, 'reason_3') ?>

    <?php // echo $form->field($model, 'reason_4') ?>

    <?php // echo $form->field($model, 'reason_5') ?>

    <?php // echo $form->field($model, 'answer_reason') ?>

    <?php // echo $form->field($model, 'misconceptions_a') ?>

    <?php // echo $form->field($model, 'misconceptions_b') ?>

    <?php // echo $form->field($model, 'misconceptions_c') ?>

    <?php // echo $form->field($model, 'misconceptions_d') ?>

    <?php // echo $form->field($model, 'misconceptions_e') ?>

    <?php // echo $form->field($model, 'misconceptions_f') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'test') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
