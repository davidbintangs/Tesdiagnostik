<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendidikans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendidikan-view">
<div class="description-block">
        <img src="<?php echo Url::base().'/'.$model['ijazah']?> " class="img-responsive center-block" alt="Ijazah"/>
    </div>
   <!--  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
           'instansi',
            'bidang',        
            'tahun_masuk',
            'tahun_keluar',
            'status_keaktifan',
            //'identitas',
        ],
    ]) ?> -->

</div>
