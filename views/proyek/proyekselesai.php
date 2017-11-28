<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\StarRating;

/* @var $this yii\web\View */
/* @var $model app\models\IdentitasMengerjakanProyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyek-selesai">

    <?php $form = ActiveForm::begin([
    'action' => ['proyekselesai','id'=>$id]]); ?>

    <?=$form->field($model, 'rating_proyek')->widget(StarRating::classname(), [
    'pluginOptions' => ['step' => 1]
    ])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
