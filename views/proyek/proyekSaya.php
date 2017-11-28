<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\m_checkstatus(conn, identifier)odels\ProyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Proyek Saya';

?>
<div class="proyek-saya">
<div class="col-md-12">
    <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Proyek</h3>  
            </div>
            <div class="box-body">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'containerOptions'=>['style'=>'overflow: auto'],
                    'pjax'=>true,
                    'pjaxSettings'=>[
                    'neverTimeout'=>true,
                    ],
                    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                    'persistResize'=>false,
                    'toggleDataOptions'=>['minCount'=>10],
                    'hover'=>true,
                    'condensed'=>true,
                    'perfectScrollbar'=>true,

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
                              $id= $model->id;
                              $dataProvider = $this->context->dataProyekSaya($id);
                
                              return Yii::$app->controller->renderPartial('_itemProyekSaya',[
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
                        //'status',
                        'deadline',
                        // 'rating_proyek',
                        // 'konfirmasi_pekerjaan',
                         'kategoriBudget.jumlah_budget',
                         [
                            'attribute'=>'status',
                            'filter'=>array("published"=>"published","penawaran diterima"=>"penawaran diterima","dibayar owner"=>"dibayar owner","proyek selesai"=>"proyek selesai")
                        ],

                       //   ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>

