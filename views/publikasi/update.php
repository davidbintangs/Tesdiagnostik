<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Publikasi',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publikasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="publikasi-update">
    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
    ]) ?>

</div>
