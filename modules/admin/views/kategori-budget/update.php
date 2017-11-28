<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KategoriBudget */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Kategori Budget',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kategori Budgets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="kategori-budget-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
