<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
 use yii\helpers\ArrayHelper;
 use kartik\widgets\Select2;
use app\models\KategoriBudget;

/* @var $this yii\web\View */
/* @var $model app\models\ProyekSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyek-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'judul') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'lampiran') ?>

    <?= $form->field($model, 'deadline')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan deadline proyek'],
        'pluginOptions' => [
            'autoclose'=>true,
            'todayHighlight' => true,
            'format' => 'yyyy-mm-dd',
        ]
        ]); ?>

    <?php // echo $form->field($model, 'rating_proyek') ?>

    <?php // echo $form->field($model, 'konfirmasi_pekerjaan') ?>

     <?=$form->field($model, 'kategori_budget')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(KategoriBudget::find()->all(),'id','jumlah_budget'),
                'options' => ['placeholder' => 'Pilih budget '],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);?>


      <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data'=>[' '=>' ','published' => 'published', 'penawaran diterima' => 'penawaran diterima','dibayar owner'=>'dibayar owner','proyek selesai'=>'proyek selesai' ], 
        'options' => ['placeholder' => 'Pilih status '],
        'pluginOptions' => [
                    'allowClear' => true,
                    'prompt'=>'pilih status proyek anda',
                ],

         ]);
      ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
