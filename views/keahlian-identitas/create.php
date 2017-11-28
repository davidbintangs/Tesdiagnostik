<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeahlianIdentitas */

$this->title = 'Create Keahlian Identitas';
// $this->params['breadcrumbs'][] = ['label' => 'Keahlian Identitas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
	

	<div class="keahlian-identitas-create">
	<div class="col-md-12">
    <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata diri</h3>  
            </div>
            <div class="box-body">

	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
		</div>
	</div>
</div>
	    
	</div>

