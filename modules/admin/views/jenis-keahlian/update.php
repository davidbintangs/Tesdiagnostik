<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKeahlian */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Jenis Keahlian',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Keahlians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="jenis-keahlian-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
