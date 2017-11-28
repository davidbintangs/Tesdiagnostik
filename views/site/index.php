<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset; 
use yii\widgets\Pjax;
use yii\grid\GridView;

    //AppAsset::register($this);
/* @var $this yii\web\View */

$this->title = 'Kreatifkita.id';
?>
<div class="site-index">

      
    <div class="col-md-12">
          <div class="box box-solid">

            <!-- /.box-header -->
            <div class="box-body">
              
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="<?=Url::base().'/dist/img/site/slider1.jpg';?>" alt="First slide">

                  </div>
                  <div class="item">
                    <img src="<?=Url::base().'/dist/img/site/slider2.jpg';?>" alt="Second slide">

                  </div>
                  <div class="item">
                    <img src="<?=Url::base().'/dist/img/site/slider3.jpg';?>" alt="Third slide">

 
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END ACCORDION & CAROUSEL-->
    <div class="body-content">
        <div class="row">
        <!-- start body layot proyek -->
            <div class="col-md-12">
              <!-- Custom Tabs (Pulled to the right) -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Waktu Rilis</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                      <li role="presentation" class="divider"></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                  </li>
                  <li class="pull-left header"><i class="fa fa-th"></i> Proyek</li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  
                                <?php Pjax::begin(); ?>    <?= GridView::widget([
                                        'dataProvider' => $dataProyek,
                                        'filterModel' => $searchProyek,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            //'id',
                                            'judul:ntext',
                                            //'gambar',
                                            //'keterangan:ntext',
                                            'created_at',
                                            // 'updated_at',
                                            // 'lampiran',
                                             'deadline',
                                            // 'rating_proyek',
                                            // 'konfirmasi_pekerjaan',
                                            'kategori_budget',

                                            //['class' => 'yii\grid\ActionColumn'],
                                        ],
                                    ]); ?>
                                <?php Pjax::end(); ?></div>


                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    
                    
          </div>



        


        
    </div>
</div>
</div>
</div>
