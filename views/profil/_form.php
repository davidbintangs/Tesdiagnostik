<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use app\models\Id;
use kartik\file\FileInput;
use kartik\widgets\Select2;
use app\models\Kodepos;
use app\models\Provinsi;
use app\models\Kecamatan;
use app\models\Kabupaten;
use app\models\Member;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model app\models\Identitas */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="profil-form">


              <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data'] // important
        ]);?>


            <?= $form->field($model, 'nama_depan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nama_belakang')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

             <?= $form->field($model, 'kode_pos')->textInput(['maxlength' => true]) ?>

           
             <?=$form->field($model, 'profinsi')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Provinsi::find()->all(),'nama_provinsi','nama_provinsi'),
                'options' => ['placeholder' => 'Pilih Profinsi '],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>


            <?=$form->field($model, 'kota')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Kabupaten::find()->all(),'nama_kabupaten','nama_kabupaten'),
                'options' => ['placeholder' => 'Pilih kota'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>

            <?= $form->field($model, 'Kecamatan')->textInput(['maxlength' => true]) ?>

            

            <?= $form->field($model, 'jk')->dropDownList([ 'laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'perusahaan')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ringkasan',[
                'hintType' => ActiveField::HINT_SPECIAL,
                'hintSettings' => ['placement' => 'right', 'onLabelClick' => true, 'onLabelHover' => false,'onIconClick' => true,
                    'onIconHover' => true,]
            ])->textArea([
                'id' => 'address-input', 
                'placeholder' => 'Ringkasan tentang diri anda', 
                'rows' => 4
            ])->hint('Ringkasan dari diri anda, ceritakan tentang kemampuan dan bagaimana diri anda'); ?>

            <?= $form->field($model, 'info_utama',[
                'hintType' => ActiveField::HINT_SPECIAL,
                'hintSettings' => ['placement' => 'right', 'onLabelClick' => true, 'onLabelHover' => false,'onIconClick' => true,
                    'onIconHover' => true,]
            ])->textArea([
                'id' => 'address-input', 
                'placeholder' => 'Info utama diri anda', 
                'rows' => 4
            ])->hint('Info utama yang akan tampil di header CV anda, berikan informasi tentang diri anda secara singkat'); ?>

            <?= $form->field($model, 'telepon')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

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

             <?php if(!$model->isNewRecord):
                    echo Html::activeHiddenInput($model, 'file');
                endif;
            ?>

            <?php $profil=Yii::$app->user->identity->id ; ?>
            
            <?=$form->field($model, 'member')->hiddenInput(['value'=>$profil])->label(false) ?>
              

           <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
             </div>

            <?php ActiveForm::end(); ?>
            </div>


