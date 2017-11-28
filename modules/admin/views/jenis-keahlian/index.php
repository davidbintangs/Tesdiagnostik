<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use kartik\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\JenisKeahlianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jenis Keahlians');
$this->params['breadcrumbs'][] = $this->title;
        if ($alert==1) { 
        echo Alert::widget([
            'type' => Alert::TYPE_SUCCESS,
            'title' => 'Berhasil',
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => 'Menambahkan data kategori proyek baru',
            'showSeparator' => true,
            'delay' => 10000,
        ]);
        }elseif ($alert==2) {
            echo Alert::widget([
            'type' => Alert::TYPE_WARNING,
            'title' => 'Berhasil',
            'icon' => 'glyphicon glyphicon-ok-sign',
            'body' => 'Data Berhasil diupdate',
            'showSeparator' => true,
            'delay' => 10000,
        ]);
            
        }
    
?>

<div class="body-content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori Keahlian</h3>
                    </div>
                    <div class="box-body"> 
                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div> 
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori Keahlian</h3>
                    </div>
                    <div class="box-body">    
                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                //'filterModel' => $searchModel,
                                'columns' => [
                                    //['class' => 'yii\grid\SerialColumn'],

                                    //'id',
                                    'nama_kategori',
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'header' => 'Actions',
                                        'template' => '{update}{delete}',
                                        'buttons' => [
                                             'update' => function ($url, $modelPendiddikan) {
                                               $url = Url::to(['jenis-keahlian/update', 'id' => $modelPendiddikan->id]);
                                              return Html::a('<span class="fa fa-pencil"></span> ', FALSE, ['value' => $url,'id'=>'buttonUpdatePendidikan']);
                                           }
                                        ]
                                    ]
                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                        <?php
                              Modal::begin([
                              //'header' => '<h4>Update Pendidikan</h4>',
                              'id' => 'modalUpdatePendidikan',
                              'size' => 'modal-sm',
                                ]); 
                                echo "<div id='kontenUpdatePendidikan'></div>";
                               Modal::end()
                          ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

