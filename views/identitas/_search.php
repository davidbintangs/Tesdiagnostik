<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IdentitasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="identitas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_depan') ?>

    <?= $form->field($model, 'nama_belakang') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'Kecamatan') ?>

    <?php // echo $form->field($model, 'kota') ?>

    <?php // echo $form->field($model, 'profinsi') ?>

    <?php // echo $form->field($model, 'jk') ?>

    <?php // echo $form->field($model, 'perusahaan') ?>

    <?php // echo $form->field($model, 'ringkasan') ?>

    <?php // echo $form->field($model, 'info_utama') ?>

    <?php // echo $form->field($model, 'telepon') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'status_verifikasi') ?>

    <?php // echo $form->field($model, 'member') ?>

    <?php // echo $form->field($model, 'member_sosial_media') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
