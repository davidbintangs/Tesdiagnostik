<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;
use app\models\KategoriBudget;
use app\models\Keahlian;
use yii\helpers\ArrayHelper;
use app\models\Identitas;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Proyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyek-form">

    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]);?>


    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deadline')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan deadline proyek'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd',
        ]
        ]); ?>

    <?= $form->field($model, 'kategori_budget')->dropDownList(
        ArrayHelper::map(KategoriBudget::find()->all(),'id','jumlah_budget'),
        ['prompt'=>'pilih budget proyek anda']
        )
    ?>
    
    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
