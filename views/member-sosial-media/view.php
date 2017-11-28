<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MemberSosialMedia */

$this->title = $model->member_id;
$this->params['breadcrumbs'][] = ['label' => 'Member Sosial Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-sosial-media-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->member_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sosial_media',
            'id',
            'username',
            'member_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
