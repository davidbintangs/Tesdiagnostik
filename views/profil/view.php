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
use kartik\mpdf\Pdf;

 //AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Identitas */

$this->title = $identitas->nama_depan;
?>
    <?php $data['jenisKeahlian']=$jenisKeahlian ?>
    <?php $data['identitas']= $identitas ?>
    <?php $data['pilKeahlian']= $pilKeahlian ?>
    <?php $data['pilProyek']=$pilProyek?> 
    <?php //$data['feedback']=$feedback ?>
    <?php $data['pilBahasa']=$pilBahasa ?>
    <?php $data['dataPengalaman']=$dataPengalaman ?>
    <?php $email=Yii::$app->user->identity->email; 
          $username=Yii::$app->user->identity->username;
          $created=Yii::$app->user->identity->created_at;
    ?>
    <?php $editprofil='profil/update?id='.$identitas->id; ?>

<div class="profil-view">
  <div class="body-content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="img img-responsive" src="<?php echo Url::base().'/'.$identitas['foto'];?>" alt="User profile picture">
             <h3 class="profile-username text-center"><?='@'.$username?></h3>
                <?php
                  if (empty($identitas['status_verifikasi'])){
                    $identitas['status_verifikasi']='belum terverifikasi';
                  } 
                 ?>
            <span class="label label-success"><?=$identitas['status_verifikasi']?></span>
            <ul class="list-group list-group-unbordered">
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
             <?= Html::button('Edit Profil', ['value' => Url::to($editprofil),'class' => 'btn btn-primary btn-block','id'=>'modalButton']) ?>

             <?= Html::a('<i class="glyphicon glyphicon-print"></i> Cetak CV', ['print'], [
                'class'=>'btn btn-primary btn-block', 
                'target'=>'_blank', 
                'data-toggle'=>'tooltip', 
                'title'=>'Will open the generated PDF file in a new window'
            ]); ?>

             <?php
                  Modal::begin([
                  'header' => '<h4>Edit Profil</h4>',
                  'id' => 'modal',
                  'size' => 'modal-md',
                    ]); 
                    echo "<div id='modalContent'></div>";
                   Modal::end()
                ?>
              

          </div>
        </div>
        <div class="box box-primary box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-star"> Rating</h3>
          </div>
          <div class="box-body">
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Rating Proyek</b> <a class="pull-right">
                <?php for ($i=0; $i <$identitas['rating_proyek']; $i++) {?> 
                <span class="fa fa-star">  
                <?php } ?> 
                </a>
              </li>
              <li class="list-group-item">
                <b>Rating Pekerja</b> <a class="pull-right">
                <?php for ($i=0; $i <$identitas['rating_pekerja']; $i++) {?> 
                  <span class="fa fa-star">  
                <?php } ?> 
                </a>
              </li>
              
            </ul>
            
          </div>
        </div>


         <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Kontak</h3>
        </div>
        <div class="box-body">
          <strong><i class="fa fa-envelope  margin-r-5"></i>Email</strong>
            <p class="text-muted">
                <?=$email;?>
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
                  <?php 
                $url = Url::to(['keahlian-identitas/delete', 'id' => $keahlian['id']]);
                 echo Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);

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
      <div class="box-footer">
            <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i>Keahlian'), ['value'=>Url::toRoute('/keahlian-identitas/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahPengalaman']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Edit Keahllian</h4>',
                  'id' => 'modalTambahPengalaman',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenTambahPengalaman'></div>";
                   Modal::end()
              ?>
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
                <?php 
                $url = Url::to(['bahasa/delete', 'id' => $bahasa['id']]);
                 echo Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);

                 ?>
                <b><?=$bahasa['bahasa'] ?></b> <a class="pull-right">

                <?php for ($i=0; $i <$bahasa['tingkat']; $i++) {?> 
                <span class="fa fa-star">  
                <?php } ?>               
                </a>
              </li>
              <?php } ?>
              </ul> 
       </div>
       <div class="box-footer">
            <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i> bahasa'), ['value'=>Url::toRoute('/bahasa/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahBahasa']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Tambah Bahasa</h4>',
                  'id' => 'modalTambahBahasa',
                  'size' => 'modal-sm',
                    ]); 
                    echo "<div id='kontenTambahBahasa'></div>";
                   Modal::end()
              ?>
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
                      //'filterModel' => $searchPengalaman,
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
                                'header' => 'Actions',
                                'template' => '{view}{update}{delete}',
                                'buttons' => [
                                   'view' => function ($url, $modelPengalaman) {
                                       $url = Url::to(['pengalaman/view', 'id' => $modelPengalaman->id]);
                                      return Html::a('<span class="fa fa-eye"></span> ', FALSE, ['value' => $url,'id'=>'buttonViewPengalaman']);
                                   },
                                     'update' => function ($url, $modelPengalaman) {
                                       $url = Url::to(['pengalaman/update', 'id' => $modelPengalaman->id]);
                                      return Html::a('<span class="fa fa-pencil"></span> ', FALSE, ['value' => $url,'id'=>'btnUpdatePengalaman']);
                                   },
                                   'delete' => function ($url, $modelPengalaman) {
                                       $url = Url::to(['pengalaman/delete', 'id' => $modelPengalaman->id]);
                                       return Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);
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

              <?php
                  Modal::begin([
                  //'header' => '<h4>Edit Pengalaman</h4>',
                  'id' => 'mdlUpdatePengalaman',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='ktnUpdatePengalaman'></div>";
                   Modal::end()
              ?>

            </div>
          </div>
        <div class="box-footer">
            <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i> pengalaman'), ['value'=>Url::toRoute('/pengalaman/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahPengalaman']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Tambah Pengalaman</h4>',
                  'id' => 'modalTambahPengalaman',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenTambahPengalaman'></div>";
                   Modal::end()
              ?>
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
                                'header' => 'Actions',
                                'template' => '{view}{update}{delete}',
                                'buttons' => [
                                   'view' => function ($url, $modelPendiddikan) {
                                       $url = Url::to(['pendidikan/view', 'id' => $modelPendiddikan->id]);
                                      return Html::a('<span class="fa fa-eye"></span> ', FALSE, ['value' => $url,'id'=>'buttonViewPendidikan']);
                                   },
                                     'update' => function ($url, $modelPendiddikan) {
                                       $url = Url::to(['pendidikan/update', 'id' => $modelPendiddikan->id]);
                                      return Html::a('<span class="fa fa-pencil"></span> ', FALSE, ['value' => $url,'id'=>'buttonUpdatePendidikan']);
                                   },
                                   'delete' => function ($url, $modelPendiddikan) {
                                       $url = Url::to(['pendidikan/delete', 'id' => $modelPendiddikan->id]);
                                       return Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);
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
                <?php
                  Modal::begin([
                  //'header' => '<h4>Update Pendidikan</h4>',
                  'id' => 'modalUpdatePendidikan',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenUpdatePendidikan'></div>";
                   Modal::end()
              ?>

           </div>


        </div>
        <div class="box-footer">
          <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i> pendidikan'), ['value'=>Url::toRoute('/pendidikan/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahPendidikan']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Tambah Pendidikan</h4>',
                  'id' => 'modalTambahPendidikan',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenTambahPendidikan'></div>";
                   Modal::end()
              ?>
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
                                'header' => 'Actions',
                                'template' => '{view}{update}{delete}',
                                'buttons' => [
                                   'view' => function ($url, $modelSertifikasi) {
                                       $url = Url::to(['sertifikasi/view', 'id' => $modelSertifikasi->id]);
                                      return Html::a('<span class="fa fa-eye"></span> ', FALSE, ['value' => $url,'id'=>'buttonViewPendidikan']);
                                   },
                                     'update' => function ($url, $modelSertifikasi) {
                                       $url = Url::to(['sertifikasi/update', 'id' => $modelSertifikasi->id]);
                                      return Html::a('<span class="fa fa-pencil"></span> ', FALSE, ['value' => $url,'id'=>'buttonUpdatePendidikan']);
                                   },
                                   'delete' => function ($url, $modelSertifikasi) {
                                       $url = Url::to(['sertifikasi/delete', 'id' => $modelSertifikasi->id]);
                                       return Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);
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

                <?php
                  Modal::begin([
                  'header' => '<h4>Update Sertifikasi</h4>',
                  'id' => 'sertifikasiUpdateModal',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='sertifikasiUpdateKonten'></div>";
                   Modal::end()
              ?>
          </div>
        </div>
        <div class="box-footer">
          <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i> sertifikasi'), ['value'=>Url::toRoute('/sertifikasi/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahSertifikasi']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Tambah sertifikasi</h4>',
                  'id' => 'modalTambahSertifikasi',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenTambahSertifikasi'></div>";
                   Modal::end()
              ?>
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
                                'header' => 'Actions',
                                'template' => '{view}{update}{delete}',
                                'buttons' => [
                                   'view' => function ($url, $modelPublikasi) {
                                       $url = Url::to(['publikasi/view', 'id' => $modelPublikasi->id]);
                                      return Html::a('<span class="fa fa-eye"></span> ', FALSE, ['value' => $url,'id'=>'buttonViewPendidikan']);
                                   },
                                     'update' => function ($url, $modelPublikasi) {
                                       $url = Url::to(['publikasi/update', 'id' => $modelPublikasi->id]);
                                      return Html::a('<span class="fa fa-pencil"></span> ', FALSE, ['value' => $url,'id'=>'buttonUpdatePendidikan']);
                                   },
                                   'delete' => function ($url, $modelPublikasi) {
                                       $url = Url::to(['publikasi/delete', 'id' => $modelPublikasi->id]);
                                       return Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);
                                   }
                                ]
                            ]
                      ],
                  ]); ?>
              <?php Pjax::end(); ?>
          </div>
        </div>
        <div class="box-footer">
          <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i> publikasi'), ['value'=>Url::toRoute('/publikasi/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahPublikasi']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Tambah Publikasi</h4>',
                  'id' => 'modalTambahPublikasi',
                  'size' => 'modal-lg',
                    ]); 
                    echo "<div id='kontenTambahPublikasi'></div>";
                   Modal::end()
              ?>
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
            <?php 
                $url = Url::to(['portofolio/delete', 'id' => $pilPortofolio['id']]);
                 echo Html::a('<span class="fa fa-trash"></span> ', $url, ['title' => 'delete', 'data-method'=>'post', 'data-confirm'=>'Yakin Menghapus Data Ini?']);

            ?>

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
        <div class="box-footer">
          <?= Html::button(Yii::t('app', '<i class="fa fa-plus"></i> portofolio'), ['value'=>Url::toRoute('/portofolio/create'), 'class' => 'btn btn-success pull-right','id'=>'buttonTambahPortofolio']) ?>
             <?php
                  Modal::begin([
                  'header' => '<h4>Tambah Portofolio</h4>',
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
</div>

