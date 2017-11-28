<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use kartik\widgets\ActiveForm; 	


/* @var $this yii\web\View */
/* @var $model app\models\Identitas */

$this->title = 'Create Identitas';
$this->params['breadcrumbs'][] = ['label' => 'Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="identitas-create">
<div class="col-md-6">
    <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata diri</h3>  
            </div>
            <div class="box-body">
			    <?= $this->render('_form', [
			        'model' => $model,
			        //'id'=>$id,
			    ]) ?>
			</div>
		</div>
	</div>
</div>
    <div class="col-md-6">
    	<div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Uploud Image</h3>  
            </div>
            <div class="box-body">
            </div>
        </div>
    </div>

</div>
