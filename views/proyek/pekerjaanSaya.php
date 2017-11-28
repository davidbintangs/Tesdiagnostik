<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PortofolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Portofolios');
?>
<div class="portofolio-index">


      <?php 
        foreach ($dataProvider as $dataProvider) { ?>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url(<?php echo Url::base().'/dist/img/photo2.png'?>) center center;">
            </div>
            <div class="description-block">
                    <b><?=$dataProvider['judul']?></b><br/>
                    <?=$dataProvider['keterangan']?><br/>
                   <?=$dataProvider['status']?>
                   </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                <div class="description-block">
                 <?php 
                     /* $url = Url::to(['view', 'id' => $portofolio->id]);
                        echo Html::a('<span class="fa fa-eye"></span> detail ', FALSE, ['value' => $url,'class' => 'btn btn-primary btn-block','id'=>'buttonViewPengalaman']);
                    */
                        echo Html::a(Yii::t('app', 'Lihat Proyek'), ['mengerjakan-proyek', 'id' => $dataProvider['id']], ['class' => 'btn btn-primary btn-block']);


                  ?>

               
                </div>
                </div>
                </div>
            </div>
      
          </div>
          <!-- /.widget-user -->
        </div>

        <?php }?>

</div>
 <?php
                  Modal::begin([
                  //'header' => '<h4>Pengalaman</h4>',
                  'id' => 'modalViewPengalaman',
                  'size' => 'modal-md',
                    ]); 
                    echo "<div id='kontenViewPengalaman'></div>";
                   Modal::end()
                ?>
