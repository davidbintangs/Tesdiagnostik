<?php
use yii\helpers\Html;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sertifikasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sertifikasi-form">

   <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data'] // important
        ]);?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pemberi')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'file_sertifikat')->widget(FileInput::classname(), [ 
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
    
    <?php 
    // if(empty($model)){ 
      echo $form->field($model, 'identitas')->hiddenInput(['value'=>$identiti])->label(false);
    //     }
    //     else{ 
             
    //  } 
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
