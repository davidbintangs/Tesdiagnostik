<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Identitas;

/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyek-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'judul',
            'gambar',
            'keterangan:ntext',
            'created_at',
            'updated_at',
            'status',
            'deadline',
            //'rating_proyek',
            //'konfirmasi_pekerjaan',
             'kategoriBudget.jumlah_budget',
        ],
    ]) ?>
    <?php 
    $identitas= new Identitas();
 	$profil=$identitas->getId();
    $proyek=$model->identitas;
   	if ($proyek==$profil) {
    	echo Html::a('Detail Penawar', ['detailproyek', 'id' => $model->id], ['class' => 'btn btn-success']);
    } else{
		echo Html::a("Tawar Proyek", ['tawar', 'id' => $model->id], ['class' => 'btn btn-primary']); 
    } 
    ?>
</div>
