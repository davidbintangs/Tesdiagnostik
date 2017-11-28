<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengalamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengalaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'perusahaan') ?>

    <?= $form->field($model, 'bulan_mulai') ?>

    <?= $form->field($model, 'tahun_mulai') ?>

    <?php // echo $form->field($model, 'status_keaktifan') ?>

    <?php // echo $form->field($model, 'bulan_selesai') ?>

    <?php // echo $form->field($model, 'tahun_selesai') ?>

    <?php // echo $form->field($model, 'ringkasan') ?>

    <?php // echo $form->field($model, 'identitas') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
