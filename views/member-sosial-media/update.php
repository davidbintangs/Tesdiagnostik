<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSosialMedia */

$this->title = 'Update Member Sosial Media: ' . $model->member_id;
$this->params['breadcrumbs'][] = ['label' => 'Member Sosial Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_id, 'url' => ['view', 'id' => $model->member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-sosial-media-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
