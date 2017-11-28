<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IdentitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Identitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Identitas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_depan',
            'nama_belakang',
            'alamat',
            'kode_pos',
            // 'Kecamatan',
            // 'kota',
            // 'profinsi',
            // 'jk',
            // 'perusahaan',
            // 'ringkasan:ntext',
            // 'info_utama',
            // 'telepon',
            // 'no_hp',
            // 'website',
            // 'scan_ktp',
            // 'stastus_verifikasi',
            // 'member',
            // 'member_sosial_media',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
