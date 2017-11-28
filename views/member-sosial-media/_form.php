<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSosialMedia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-sosial-media-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sosial_media')->dropDownList([ 'facebook' => 'Facebook', 'google' => 'Google', 'twitter' => 'Twitter', 'github' => 'Github', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
