<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\widgets\RangeInput;
use kartik\slider\Slider;

?>

<div class="kategori-budget-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_budget')->textInput(['maxlength' => true]) ?>

	 <?= $form->field($model, 'poin')->widget(Slider::classname(), [
	    'pluginOptions'=>[
	        'min'=>0,
	        'max'=>5,
	        'step'=>1,
    	    'tooltip'=>'always'
	    ]
		]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
