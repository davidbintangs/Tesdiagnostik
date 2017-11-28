<?php

use yii\helpers\Html;
use kartik\widgets\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\KeahlianIdentitas */

$this->title = 'Create Keahlian Identitas';
// $this->params['breadcrumbs'][] = ['label' => 'Keahlian Identitas', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
	<?php $data['jenisKeahlian']=$jenisKeahlian ?>

	<div class="keahlian-identitas-create">
	   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

	</div>

