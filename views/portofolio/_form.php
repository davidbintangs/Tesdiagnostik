<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use app\models\Identitas;

/* @var $this yii\web\View */
/* @var $model app\models\Portofolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portofolio-form">

     <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data'] // important
        ]);?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_foto')->widget(FileInput::classname(), [ 
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
     'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false,
        'browseLabel' =>  'Pilih Foto',]
        ]
        );?>

        <?php /*= $form->field($model, 'file_lampiran')->widget(FileInput::classname(), [ 
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
     'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i> ',
        'showPreview' => true,
        'showCaption' => true,
        'showRemove' => true,
        'showUpload' => false,
        'browseLabel' =>  'Pilih berkas',
        ]
        ]
        );*/?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

     <?php 
    $identitas =new Identitas();
    $identitas= $identitas->getId();
     ?>

    <?= $form->field($model, 'identitas')->hiddenInput(['value'=>$identitas])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
