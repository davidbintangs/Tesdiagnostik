<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengalaman */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pengalaman',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengalamen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pengalaman-update">
    <?= $this->render('_form', [
        'model' => $model,
        //'id'=>$id,
    ]) ?>

</div>
