<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
    use kartik\slider\Slider;

/* @var $this yii\web\View */
/* @var $model app\models\Bahasa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bahasa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bahasa')->textInput(['maxlength' => true]) ?>


	 <?= $form->field($model, 'tingkat')->widget(Slider::classname(), [
	    'pluginOptions'=>[
	        'min'=>0,
	        'max'=>5,
	        'step'=>1,
    	    'tooltip'=>'always'
	    ]
		]);?>


    <?= $form->field($model, 'identitas')->hiddenInput(['value'=>$id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
