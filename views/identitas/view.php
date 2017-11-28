<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Identitas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_depan',
            'nama_belakang',
            'alamat',
            'kode_pos',
            'Kecamatan',
            'kota',
            'profinsi',
            'jk',
            'perusahaan',
            'ringkasan:ntext',
            'info_utama',
            'telepon',
            'no_hp',
            'website',
            'foto',
            'status_verifikasi',
            'member',
            'member_sosial_media',
        ],
    ]) ?>

</div>
