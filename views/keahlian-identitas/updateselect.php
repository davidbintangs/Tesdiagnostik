<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeahlianIdentitas */

$this->title = 'Create Keahlian Identitas';
// $this->params['breadcrumbs'][] = ['label' => 'Keahlian Identitas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
	

	<div class="keahlian-identitas-create">
	<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
	    
	</div>

