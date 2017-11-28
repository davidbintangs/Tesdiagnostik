<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengalaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengalaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perusahaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bulan_mulai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_mulai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_keaktifan')->dropDownList([ 'aktif' => 'Aktif', 'nonaktif' => 'Nonaktif', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'bulan_selesai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_selesai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ringkasan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identitas')->hiddenInput(['value'=>$identiti])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
