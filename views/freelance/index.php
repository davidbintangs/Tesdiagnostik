<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Member;
use app\models\Keahlian;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\IdentitasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Identitas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-index">
    <div id="images">

    <?php 
        foreach ($model as $model) { ?>
        <div class="item">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
              
            </div>
            <div class="widget-user-image">
              <img class="img img-responsive" src="<?php echo Url::base().'/'.$model['foto'];?>" alt="User Avatar" wight="100">
            </div>
            <div class="box-footer">
              <div class="row">
              <div class="col-sm-12 border-right">
                   <div class="description-block">
                    <b><?= $model['nama_depan'] ?> <?= $model['nama_belakang'] ?></b>
                    <p><?= $model['info_utama'] ?></p>
                    <p><?=$model['kota'].', '.$model['profinsi'].' ('.$model['kode_pos'].')'?></p>

                   </div>
                   
              </div>
              <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <?php 
                        $member = new Member();
                        $member = $member->getMember($model['id']);
                        echo $member['email'];
                     ?>                
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <?=$model['no_hp'];?>
                  </div>
                  <!-- /.description-block -->
                </div>
            
                
              </div>
              <!-- /.row -->
               <div class="description-block">

              <?= Html::a(Yii::t('app', 'Lihat Profil'), ['profil/member', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
            

            </div>
            
          </div>
          <!-- /.widget-user -->
        </div>
        </div>

        </div>
        <?php }?>

    </div>
</div>

