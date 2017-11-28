<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeahlianIdentitas */

$this->title = 'Update Keahlian Identitas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keahlian Identitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keahlian-identitas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
