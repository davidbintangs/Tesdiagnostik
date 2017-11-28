<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Identitas */

$this->title = 'Update Identitas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="identitas-update">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
