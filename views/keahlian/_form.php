<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Keahlian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keahlian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_keahlian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jenis_keahlian')->textInput() ?>

    <?= $form->field($model, 'total_proyek')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
