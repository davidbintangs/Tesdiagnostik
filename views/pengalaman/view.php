<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengalaman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengalamen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengalaman-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'judul',
            'perusahaan',
            'bulan_mulai',
            'tahun_mulai',
            'status_keaktifan',
            'bulan_selesai',
            'tahun_selesai',
            'ringkasan',
            //'identitas',
        ],
    ]) ?>

</div>
