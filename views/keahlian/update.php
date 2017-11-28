<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keahlian */

$this->title = 'Update Keahlian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keahlians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keahlian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
