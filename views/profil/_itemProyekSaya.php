<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyek-view">

    <?= DetailView::widget([
        'model' => $dataproyek,
        'attributes' => [
            //'id',
            //'judul',
            'gambar',
            'keterangan:ntext',
            'created_at',
            'updated_at',
            //'lampiran',
            'deadline',
            //'rating_proyek',
            //'konfirmasi_pekerjaan',
             'kategoriBudget.jumlah_budget',
        ],
    ]) ?>
    <?= Html::a('Detail Penawar', ['detailproyek', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

</div>
