<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\IdentitasMengerjakanProyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Identitas Mengerjakan Proyeks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-mengerjakan-proyek-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Proyek dikerjakan</h3>
                    </div>
                    <div class="box-body">

                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    //'id',
                                    'identitas0.nama_depan',
                                    'proyek0.judul',
                                    //'jobdesk',
                                    'dana',
                                    
                                    'waktu',
                                    'status',
                                     //'feedback:ntext',
                                    // 'rating_pekerja',                                    
                                    [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Actions',
                                    'template' => ' {update} {delete} {verifikasi}',
                                    'buttons' => [
                                       'verifikasi' => function ($url, $proyekDikerjakan) {
                                        if ($proyekDikerjakan->status=='tawaran diterima') {
                                            $url = Url::to(['identitas-mengerjakan-proyek/bayar', 'id' => $proyekDikerjakan->id]);
                                               return Html::a(' <div class="btn btn-primary btn-xs">Dibayar</div> ', $url, ['title' => 'dibayar', 'data-method'=>'post', 'data-confirm'=>'Yakin mengubah status proyek ini ?']);
                                        }
                                        elseif ($proyekDikerjakan->status=='dibayar owner') {
                                            $url = Url::to(['identitas-mengerjakan-proyek/selesai', 'id' => $proyekDikerjakan->id]);
                                               return Html::a(' <div class="btn btn-primary btn-xs">Proyek selesai</div> ', $url, ['title' => 'verifikasi', 'data-method'=>'post', 'data-confirm'=>'Yakin mengubah status proyek ini ?']);   
                                        }
                                        else{

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
