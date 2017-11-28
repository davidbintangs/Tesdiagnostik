<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Pendidikan',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendidikans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pendidikan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
    ]) ?>

</div>
