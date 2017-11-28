<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sertifikasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sertifikasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertifikasi-view">
<div class="description-block">
        <img src="<?php echo Url::base().'/'.$model['sertifikat']?> " class="img-responsive center-block" alt="Portofolio"/>
    </div>
   <!--  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'judul',
            'pemberi',
            'gambar',
            'tahun',
            'keterangan',
            'identitas',
        ],
    ]) ?> -->

</div>
