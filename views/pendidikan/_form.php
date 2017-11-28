<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pendidikan-form">

     <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data'] // important
        ]);?>
        
    <?= $form->field($model, 'instansi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bidang')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tahun_masuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_keluar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_keaktifan')->dropDownList([ 'aktif' => 'Aktif', 'nonaktif' => 'Nonaktif', ], ['prompt' => '']) ?>
    
     <?= $form->field($model, 'file_ijazah')->widget(FileInput::classname(), [ 
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

    <?= $form->field($model, 'identitas')->hiddenInput(['value'=>$identiti])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
