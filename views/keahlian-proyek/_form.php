<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Keahlian;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\KeahlianProyek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keahlian-proyek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'pilKeahlian')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Keahlian::find()->all(),'id','nama_keahlian'),
        'size' => Select2::LARGE,
        'options' => ['placeholder' => 'Pilih keahlian...'],
        'pluginOptions' => [
        	
        	'tokenSeparators' => [',', ' '],
 	    	'maximumInputLength' => 20,
 	    	'manimumInputLength' => 1,
            'allowClear' => true,
            'multiple' => true
        ],
    ])->label('Pilih Keahlian');?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
