<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\IdentitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="identitas-index">
<div class="body-content">
    <div class="row">
        <div class="col-md-12">
            
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Kategori Keahlian</h3>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'nama_depan',
                                'nama_belakang',
                                //'alamat',
                                //'kode_pos',
                                // 'Kecamatan',
                                // 'kota',
                                // 'profinsi',
                                // 'jk',
                                // 'perusahaan',
                                // 'ringkasan:ntext',
                                // 'info_utama',
                                // 'telepon',
                                 'no_hp',
                                // 'website',
                                // 'foto',
                                 'status_verifikasi',
                                // 'member',
                                // 'member_sosial_media',
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Actions',
                                    'template' => '{view}{verifikasi}',
                                    'buttons' => [
                                       'verifikasi' => function ($url, $modelVerifikasi) {
                                        if ($modelVerifikasi->status_verifikasi=='terverifikasi') {
                                            
                                        }
                                        else{
                                               $url = Url::to(['identitas/verifikasi', 'id' => $modelVerifikasi->id]);
                                               return Html::a(' <div class="btn btn-primary btn-xs">Verifikasi</div> ', $url, ['title' => 'verifikasi', 'data-method'=>'post', 'data-confirm'=>'Yakin memverifikasi member ini ?']);
                                           }
                                        }
                                    ]
                                ],
                            ],
                        ]); ?>
                    <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

