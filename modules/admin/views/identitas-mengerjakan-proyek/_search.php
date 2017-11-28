<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\IdentitasMengerjakanProyekSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="identitas-mengerjakan-proyek-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'identitas') ?>

    <?= $form->field($model, 'proyek') ?>

    <?= $form->field($model, 'jobdesk') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'feedback') ?>

    <?php // echo $form->field($model, 'rating_pekerja') ?>

    <?php // echo $form->field($model, 'dana') ?>

    <?php // echo $form->field($model, 'waktu') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
