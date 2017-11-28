<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = 'Create Proyek';
?>
<div class="proyek-create">
<div class="col-md-6">
    <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Buat Proyek</h3>  
            </div>
            <div class="box-body">
    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
        
    ]) ?>
    </div>
		</div>
	</div>
</div>
    <div class="col-md-6">
    	<div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Tips </h3>  
            </div>
            <div class="box-body">
            </div>
        </div>
    </div>


</div>
