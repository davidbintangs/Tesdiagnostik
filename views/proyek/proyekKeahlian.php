<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use app\models\ProyekSearch;
use app\models\Proyek;
use app\models\Identitas;
use app\models\Keahlian;
use app\models\KeahlianProyek;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyek sesuai keahlian';
$identitas= new Identitas();
$id=$identitas->getId();
$keahlian =new keahlian();
$pilKeahlian = $keahlian->getPilKeahlian($id);

?>

<div class="proyek-index">
 <div class="col-md-9 pull-right">
        <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Keahlian Saya</h3>  
                </div>
                <div class="box-body">
                    <p>
            <?php 
                  foreach ($pilKeahlian as $keahlian) {
                  ?>
                   <button name="search"  class="btn btn-success btn-xs"><?=$keahlian['nama_keahlian']?></button>
                 
            <?php } ?>
          </p>
                </div>
            </div>
        </div>
    <div class="col-md-3 pull-left">
        <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Pencarian</h3>  
                </div>
                <div class="box-body">
                     <?= $this->render('_search', [
                            'model' => $searchModel,
                        ]) ?>
                </div>
        </div>
    </div>
<div class="col-md-9">
    <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Proyek</h3>  
            </div>
            <div class="box-body">
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'containerOptions'=>['style'=>'overflow: auto'],
                        'pjax'=>true,
                        'pjaxSettings'=>[
                        'neverTimeout'=>true,
                        ],
                        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                        'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                        'persistResize'=>true,
                        'toggleDataOptions'=>['minCount'=>10],
                        'hover'=>true,
                        'condensed'=>false,
                        'perfectScrollbar'=>false,

                         'showPageSummary' => true,

                        'export'=>[
                            'fontAwesome'=>true
                        ],
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],
                           [
                                'class' => 'kartik\grid\ExpandRowColumn',
                                'value' => function ($model, $key, $index, $column){
                                    //return detailView;
                                    return GridView::ROW_COLLAPSED;
                                },
                                'detail' => function ($model, $key, $index, $column){
                                  $proyek = new Proyek();
                                  $id=$model->id;
                                  $dataProvider = $proyek->findOne($id);
                    
                                  return Yii::$app->controller->renderPartial('_itemProyek',[
                                    //'searchModel' => $searchModel,
                                    'model' => $dataProvider, 
                                    ]);
                                },
                            ],
                            //'id',
                            'judul',
                            //'identitas0.nama_depan',
                            //'gambar',
                            //'keterangan:ntext',
                            //'created_at',
                            // 'updated_at',
                            // 'lampiran',
                            'deadline',
                            // 'rating_proyek',
                            // 'konfirmasi_pekerjaan',
                             'kategoriBudget.jumlah_budget',
                              [
                                    'attribute'=>'status',
                                    'filter'=>array("published"=>"published","penawaran diterima"=>"penawaran diterima","dibayar owner"=>"dibayar owner","proyek selesai"=>"proyek selesai")
                                ],

                           // ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                <?php Pjax::end(); ?></div>
        </div>
    </div>
</div>
</div>
