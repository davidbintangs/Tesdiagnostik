<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use kartik\dialog\Dialog;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\editable\Editable;
use app\assets\AppAsset;


 //AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Identitas */

$this->title = $identitas->nama_depan;
?>
    <?php $data['jenisKeahlian']=$jenisKeahlian ?>
    <?php $data['identitas']= $identitas ?>
    <?php $data['pilKeahlian']= $pilKeahlian ?>
    <?php //$data['feedback']=$feedback ?>
    <?php $data['pilBaha']=$pilBahasa ?>
    <?php $data['member']=$member ?>
    <?php $editprofil='profil/update?id='.$identitas->id; ?>

<div class="profil-view">
  <div class="body-content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="img img-responsive" src="<?php echo Url::base().'/'.$identitas['foto'];?>" alt="User profile picture">
             <h3 class="profile-username text-center"><?='@'.$member['username']?></h3>
                <?php
                  if (empty($identitas['status_verifikasi'])){
                    $identitas['status_verifikasi']='belum terverifikasi';
                  } 
                 ?>
            <span class="label label-success"><?=$identitas['status_verifikasi']?></span>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Rating</b> <a class="pull-right">-</a>
              </li>
              <li class="list-group-item">
                <b>Pekerjaan Selesai</b> <a class="pull-right">0</a>
              </li>
              <li class="list-group-item">
                <b>Proyek Aktif</b> <a class="pull-right">0</a>
              </li>
                <li class="list-group-item">
                  <b>Penawaran</b> <a class="pull-right">0</a>
                </li>
              </ul> 
             <?php /* echo Html::button('<span class="fa fa-rocket"></span> Rekrut', ['value' => Url::to($editprofil),'class' => 'btn btn-primary btn-block','id'=>'modalButton'])*/ ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Edit Profil</h4>',
                  'id' => 'modal',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='modalContent'></div>";
                   Modal::end()
                ?>
              

          </div>
        </div>
         <div class="box box-primary box-solid ">
        <div class="box-header with-border">
          <h3 class="box-title">Kontak</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>     
        </div>
           
        <div class="box-body">
          <strong><i class="fa fa-envelope  margin-r-5"></i>Email</strong>
            <p class="text-muted">
                <?=$member['email'];?>
            </p>
            <hr>
          <strong><i class="fa fa-phone-square margin-r-5"></i> HP</strong>
          <p class="text-muted"><?=$identitas['no_hp']?></p>
          <hr>
          <strong><i class="fa fa-file-text-o margin-r-5"></i>Alamat</strong>
          <p><?=$identitas['alamat'].', '.$identitas['Kecamatan'].', '.$identitas['kota'].', '.$identitas['profinsi'].' ('.$identitas['kode_pos'].')'?></p>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Skill Utama </h3>
        </div>
        <div class="box-body">
          <p>
            <?php 
                  foreach ($pilKeahlian as $keahlian) {
                  ?>
                  <span class="label label-success"><?=$keahlian['nama_keahlian']?></span>
                  <br>
            <?php } ?>
          </p>
          <p>
            <?php 
              foreach ($jenisKeahlian as $jk) {
            ?>
          <span class="label label-success"><?=$jk['nama_kategori']?></span>
            <?php } ?>
          </p>
       </div>
      </div>

       <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Bahasa</h3>
        </div>
        <div class="box-body">
           <ul class="list-group list-group-unbordered">
              <?php 
                  foreach ($pilBahasa as $bahasa) {
                  ?>
              <li class="list-group-item">
                <b><?=$bahasa['bahasa'] ?></b> <a class="pull-right">
                <?php for ($i=0; $i <$bahasa['tingkat']; $i++) {?> 
                <span class="fa fa-star">  
                <?php } ?> </a>
              </li>
              <?php } ?>
              </ul> 
       </div>
      </div>
    </div>

    <div class="col-md-9 pull-right">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="callout callout">
            <p><h2><b><?=$identitas['nama_depan']?> <?=$identitas['nama_belakang'];?></b></h2></p>
            <p><h2>
            <?php //echo '<label>Person Name</label><br>';
                // echo Editable::widget([
                //     'name'=>'person_name', 
                //     'asPopover' => true,
                //     'value' => 'Kartik Visweswaran',
                //     'header' => 'Name',
                //     'size'=>'md',
                //      'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
              //]); ?>
            </h2></p>
            <br/>
            <p><h4><?=$identitas['info_utama']?></h4></p> 
          </div>
            <?=$identitas['ringkasan']?>
        </div>
      </div>
    </div>


  
    <div class="col-md-9 pull-right">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pengalaman</h3>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
        </div>
          <div class="box-body">
            <div class="pengalaman-index">
              <?php Pjax::begin(); ?>    <?= GridView::widget([
                      'dataProvider' => $dataPengalaman,
                      
                      'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                          //'id',
                          'judul',
                          'perusahaan',
                          'bulan_mulai',
                          'tahun_mulai',
                          'status_keaktifan',
                          // 'bulan_selesai',
                          // 'tahun_selesai',
                          'ringkasan',
                          // 'identitas',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => ' ',
                                'template' => '{view}',
                                'buttons' => [
                                   'view' => function ($url, $modelPengalaman) {
                                       $url = Url::to(['pengalaman/view', 'id' => $modelPengalaman->id]);
                                      return Html::a('<div class="btn btn-primary btn-xs">detail</div>', FALSE, ['value' => $url,'id'=>'buttonViewPengalaman']);
                                   }
                                ]
                            ]
                      ],
                  ]); ?>
              <?php Pjax::end(); ?>

              <?php
                  Modal::begin([
                  //'header' => '<h4>Pengalaman</h4>',
                  'id' => 'modalViewPengalaman',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenViewPengalaman'></div>";
                   Modal::end()
              ?>

            </div>
          </div>
      </div>
    </div>

    <div class="col-md-9 pull-right">
      <div class="box box-primary">
        <div class="box-header with-border">
              <h3 class="box-title">Pendidikan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>    
        <div class="box-body">
          <div class="pendidikan-index">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataPendidikan,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        'instansi',
                        'bidang',
                        'tahun_masuk',
                        'tahun_keluar',
                        'status_keaktifan',
                        // 'identitas',

                         [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => '',
                                'template' => '{view}',
                                'buttons' => [
                                   'view' => function ($url, $modelPendiddikan) {
                                       $url = Url::to(['pendidikan/view', 'id' => $modelPendiddikan->id]);
                                      return Html::a('<div class="btn btn-primary btn-xs">detail</div> ', FALSE, ['value' => $url,'id'=>'buttonViewPendidikan']);
                                   }
                                ]
                            ]
                    ],
                ]); ?>
            <?php Pjax::end(); ?>
             <?php
                  Modal::begin([
                  //'header' => '<h4>Pendidikan</h4>',
                  'id' => 'modalViewPendidikan',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenViewPendidikan'></div>";
                   Modal::end()
              ?>
           </div>
        </div>
    </div>
   </div>
    
    <div class="col-md-9 pull-right">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Sertifikasi</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="sertifikasi-index">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataSertifikasi,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        'judul',
                        'pemberi',
                        //'gambar',
                        'tahun',
                        'keterangan',
                        // 'identitas',
                        [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => '',
                                'template' => '{view}',
                                'buttons' => [
                                   'view' => function ($url, $modelSertifikasi) {
                                       $url = Url::to(['sertifikasi/view', 'id' => $modelSertifikasi->id]);
                                      return Html::a('<div class="btn btn-primary btn-xs">detail</div>', FALSE, ['value' => $url,'id'=>'buttonViewPendidikan']);
                                   }
                                ]
                            ]
                    ],
                ]); ?>
            <?php Pjax::end(); ?>

            <?php
                  Modal::begin([
                  'header' => '<h4>Sertifikasi</h4>',
                  'id' => 'sertifikasiViewModal',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='sertifikasiViewKonten'></div>";
                   Modal::end()
              ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-9 pull-right">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Publikasi</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
        </div>
        <div class="box-body">
          <div class="publikasi-index">
              <?php Pjax::begin(); ?>    <?= GridView::widget([
                      'dataProvider' => $dataPublikasi,
                      //'filterModel' => $searchModel,
                      'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                          //'id',
                          'judul',
                          'penerbit',
                          'keterangan',
                          'url:url',
                          // 'identitas',
                          [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => ' ',
                                'template' => '{view}',
                                'buttons' => [
                                   'view' => function ($url, $modelPublikasi) {
                                       $url = Url::to(['publikasi/view', 'id' => $modelPublikasi->id]);
                                      return Html::a('<div class="btn btn-primary btn-xs">detail</div>', FALSE, ['value' => $url,'id'=>'buttonViewPendidikan']);
                                   }
                                ]
                            ]
                      ],
                  ]); ?>
              <?php Pjax::end(); ?>
          </div>
        </div>
    </div>
  </div>

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Portofolio</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <?php 
        foreach ($pilPortofolio as $pilPortofolio) { ?>
        <div class="col-md-4">

          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">

            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url(<?php echo Url::base().'/'.$pilPortofolio['gambar']?>) center center;">
            </div>
            <div class="description-block">
            
                    <b><?=$pilPortofolio['judul']?></b><br/>
                    <?=$pilPortofolio['tanggal']?><br/>
                   <?=$pilPortofolio['url']?>
                   <p>
                   </p>
                   </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12 border-right">
                <div class="description-block">
                 <?php 
                      $url = Url::to(['portofolio/view', 'id' => $pilPortofolio['id']]);
                        echo Html::a('<span class="fa fa-eye"></span> detail ', FALSE, ['value' => $url,'class' => 'btn btn-primary btn-block','id'=>'buttonTambahPortofolio']);
                  ?>              
                </div>
                </div>
                </div>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <?php }?>
          <?php
                  Modal::begin([
                  //'header' => '<h4>Pengalaman</h4>',
                  'id' => 'modalTambahPortofolio',
                  'size' => 'modal-md',
                    ]); 
                    echo "<div id='kontenTambahPortofolio'></div>";
                   Modal::end()
                ?>  
  
        </div>
      </div>
    </div>
    </div>
  </div>


