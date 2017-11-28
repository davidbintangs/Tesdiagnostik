<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\KeahlianIdentitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keahlian Identitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keahlian-identitas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php $data['JenisKeahlian']=$JenisKeahlian;?>

    <p>
    <?php 
        foreach ($JenisKeahlian as $JenisKeahlian) {
            echo $JenisKeahlian['nama_kategori'];
        }
     ?>
        <?= Html::a('Create Keahlian Identitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'keahlian0.nama_keahlian',
            'identitas0.nama_depan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
