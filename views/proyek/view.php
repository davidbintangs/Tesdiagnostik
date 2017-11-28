<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = $model->id;
?>
<div class="proyek-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'judul',
            'gambar',
            'keterangan:ntext',
            'created_at',
            'updated_at',
            'lampiran',
            'deadline',
            'rating_proyek',
            'konfirmasi_pekerjaan',
            'kategori_budget',
        ],
    ]) ?>

</div>
