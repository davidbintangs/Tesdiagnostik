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
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portofolio-index">


      <?php 
        foreach ($portofolio as $portofolio) { ?>
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url(<?php echo Url::base().'/'.$portofolio['gambar']?>) center center;">
            </div>
            <div class="description-block">
                    <b><?=$portofolio['judul']?></b><br/>
                    <?=$portofolio['tanggal']?><br/>
                   <?=$portofolio['url']?>
                   </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                <div class="description-block">
                 <?php 
                      $url = Url::to(['view', 'id' => $portofolio->id]);
                        echo Html::a('<span class="fa fa-eye"></span> detail ', FALSE, ['value' => $url,'class' => 'btn btn-primary btn-block','id'=>'buttonViewPengalaman']);

                        echo Html::a(Yii::t('app', 'Lihat Profil'), ['profil/member', 'id' => $portofolio->identitas], ['class' => 'btn btn-primary btn-block']);

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
