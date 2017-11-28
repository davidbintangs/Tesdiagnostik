<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h1>Komentar</h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field ($model,'nama')->label('nama anda') ?>
<?= $form->field ($model,'komentar')->label('komentar anda') ?>
<?= Html::submitButton('Simpan',['class'=>'btn btn-primary']) ?>
<?php $form = ActiveForm::end(); ?>