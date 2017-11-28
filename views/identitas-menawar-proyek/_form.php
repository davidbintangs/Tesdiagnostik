<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\money\MaskMoney;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\IdentitasMenawarProyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="identitas-menawar-proyek-form">

   <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data'] // important
        ]);?>

    <?=$form->field($model, 'dana')->widget(MaskMoney::classname(), [
    'pluginOptions' => [
        'prefix' => 'Rp.',
        'allowNegative' => false,
        'allowEmpty' => true,
        'precision' => 0,
        'thousands' => '.',
        'decimal' => ',',

        ]
    ]);?>

    <?= $form->field($model, 'pesan')->textarea(['rows' => 6]) ?>

    

    <?= $form->field($model, 'waktu')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan deadline proyek'],
        'pluginOptions' => [
            'autoclose'=>true,
            'type'=>DateControl::FORMAT_DATE,
            'displayFormat' => 'Y-m-d',
            'saveFormat' => 'Y-m-d'
        ]   
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
