<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Portofolio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portofolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="portofolio-view">
  <div class="description-block">
        <img src="<?php echo Url::base().'/'.$model['gambar']?> " class="img-responsive center-block" alt="Portofolio"/>
    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'judul',
            'tanggal',
            'url:url',
            //'gambar',
            //'lampiran',
            'keterangan:ntext',
            //'identitas',
        ],
    ]) ?>

</div>
