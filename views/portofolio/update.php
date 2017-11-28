<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Portofolio */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Portofolio',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portofolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="portofolio-update">


    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
    ]) ?>

</div>
