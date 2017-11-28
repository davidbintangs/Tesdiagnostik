<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IdentitasMenawarProyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="identitas-menawar-proyek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'identitas')->textInput() ?>

    <?= $form->field($model, 'proyek')->textInput() ?>

    <?= $form->field($model, 'dana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pesan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'waktu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
