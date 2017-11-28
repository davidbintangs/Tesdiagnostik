<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\StarRating;

/* @var $this yii\web\View */
/* @var $model app\models\IdentitasMengerjakanProyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="identitas-mengerjakan-proyek-form">

    <?php $form = ActiveForm::begin([
    'action' => ['proyekselesai','id'=>$id]]); ?>

    <?= $form->field($model, 'feedback')->textarea(['rows' => 6]) ?>

    <?=$form->field($model, 'rating_pekerja')->widget(StarRating::classname(), [
    'pluginOptions' => ['step' => 1]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
