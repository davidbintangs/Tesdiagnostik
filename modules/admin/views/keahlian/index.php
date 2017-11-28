<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\KeahlianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Keahlians');
$this->params['breadcrumbs'][] = $this->title;
$data['jenisKeahlian']=$jenisKeahlian;
?>
<div class="keahlian">
  <div class="body-content">
    <div class="row">
        <div class="col-md-9">
            <p>
                <?= Html::a(Yii::t('app', 'Buat Keahlian'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Keahlian</h3>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                //'id',
                                'nama_keahlian',
                                'jenisKeahlian.nama_kategori',
                                'total_proyek',
                                 [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Actions',
                                    'template' => '{update} {delete}',
                                ]
                            ],
                        ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <p>
            <br/>
            <br/>
            </p>
            <div class="box box-primary box-solid ">
                    <div class="box-header with-border">
                    <h3 class="box-title">Kategori Keahlian</h3>
                      <div class="box-tools pull-right">
                       <?= Html::a(Yii::t('app', '<span class="fa fa-eye"></span>'), ['jenis-keahlian/index']) ?>

                        
                      </div>     
                    </div>
                <div class="box-body">

                            <?php 
                            foreach ($jenisKeahlian as $jenisKeahlian) {
                            ?>
                            <div class="form-group">
                                <label>
                                  <input type="checkbox" class="flat-red" checked>
                                  <b><?=$jenisKeahlian['nama_kategori'] ?></b>
                                </label>
                            </div>
                            <?php } ?>
                             <?php $editprofil='profil/update?id=' ?>
                 <?= Html::button('Filter', ['value' => Url::to($editprofil),'class' => 'btn btn-primary btn-block','id'=>'modalButton']) ?>
                </div>

            </div>
        </div>
    </div>      
  </div>
</div>

