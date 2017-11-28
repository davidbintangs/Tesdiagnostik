<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bahasa */

$this->title = 'Update Bahasa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bahasas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bahasa-update">

    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
    ]) ?>

</div>
