<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Keahlian;
use yii\helpers\ArrayHelper;
use kartik\sortinput\SortableInput;

/* @var $this yii\web\View */
/* @var $model app\models\KeahlianIdentitas */
/* @var $form yii\widgets\ActiveForm */
?>
<?php //$data['id']=$id ?>

<div class="keahlian-identitas-form">

    <?php $form = ActiveForm::begin(); ?>

   <?=$form->field($model, 'keahlian')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Keahlian::find()->all(),'id','nama_keahlian'),
         'size' => Select2::LARGE,
        'options' => ['placeholder' => 'Pilih keahlian...','multiple' => true],
        'pluginOptions' => [
        	'tags' => true,
        	'tokenSeparators' => [',', ' '],
 	    	'maximumInputLength' => 20,
 	    	'manimumInputLength' => 1,
            'allowClear' => true
        ],
    ])->label('Pilih Keahlian');?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Pilih' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); 
    ?>



</div>
