<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PendidikanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendidikan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bidang') ?>

    <?= $form->field($model, 'instansi') ?>

    <?= $form->field($model, 'tahun_masuk') ?>

    <?= $form->field($model, 'status_keaktifan') ?>

    <?php // echo $form->field($model, 'tahun_keluar') ?>

    <?php // echo $form->field($model, 'identitas') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
