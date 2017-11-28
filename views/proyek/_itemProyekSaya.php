<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Keahlian;
use app\models\Identitas;
use app\models\KeahlianProyek;

/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

//$this->title = $model->id;
?>
<div class="proyek-view">
    <?php 

        $identitas= new Identitas();
        $id=$identitas->getId();
        $keahlian =new keahlian();
        $pilKeahlian = $keahlian->getPilKeahlianProyek($model['id']);
     ?>
        <p>
            <?php 
                  foreach ($pilKeahlian as $keahlian) {
                  ?>
                   <button name="search"  class="btn btn-success btn-sm"><?=$keahlian['nama_keahlian']?></button>
                 
            <?php } ?>
          </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'judul',
            //'gambar',
            'keterangan:ntext',
            'created_at',
            //'updated_at',
            //'lampiran',
            'deadline',
            //'rating_proyek',
            //'konfirmasi_pekerjaan',
             'kategoriBudget.jumlah_budget',
        ],
    ]) ?>

    <?php if ($model['status']=='published'||$model['status']=='ditawar') {
    echo Html::a('Detail Penawar', ['detailproyek', 'id' => $model->id], ['class' => 'btn btn-primary']);

    }else{ 
    echo Html::a('Detail Pengerjaan', ['proyekdikerjakan', 'id' => $model->tawaran], ['class' => 'btn btn-primary']);
     } ?>
</div>
