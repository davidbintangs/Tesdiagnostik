<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sertifikasi */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sertifikasi',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sertifikasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sertifikasi-update">

    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
    ]) ?>

</div>
