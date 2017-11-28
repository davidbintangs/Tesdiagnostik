<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publikasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publikasi-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'judul',
            'penerbit',
            'keterangan',
            'url:url',
            'identitas',
        ],
    ]) ?>

</div>
