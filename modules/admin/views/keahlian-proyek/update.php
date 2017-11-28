<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeahlianProyek */

$this->title = 'Update Keahlian Proyek: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keahlian Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keahlian-proyek-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
