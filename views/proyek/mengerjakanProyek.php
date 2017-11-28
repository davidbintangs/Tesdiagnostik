<?php 
  
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\widgets\StarRating;

$base = $_SERVER['REQUEST_URI'];
 ?>
<?php 
  $namaPembuat=$dataOwner['nama_depan'].' '.$dataOwner['nama_belakang'];
  $noHpPembuat=$dataOwner['no_hp'];
 ?>


<div class="proyek-view">
  <div class="body-content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary pull-right">
          <div class="box-header with-border">
          <h3 class="box-title">Pembuat Proyek</h3>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
          </div>
          <div class="box-body box-profile">
            <img class="img img-responsive" src="<?php echo Url::base().'/'.$dataOwner['foto'];?>" alt="User profile picture">
            
           <div class="box-body">
           <strong><i class="fa fa-user margin-r-5"></i><?=$dataOwner['nama_depan'].' '.$dataOwner['nama_belakang']; ?></strong>
            <p class="text-muted">
                <?php echo' @'.$member['username'];?>
            </p>
            <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
            <p class="text-muted">
                <?php echo $member['email'];?>
            </p>
            <hr>
          <strong><i class="fa fa-phone-square margin-r-5"></i> HP</strong>
          <p class="text-muted"><?=$dataOwner['no_hp']?></p>
          <hr>
        </div>
                
             <?= Html::a(Yii::t('app', 'Lihat Profil'), ['profil/member', 'id' => $dataOwner['id']], ['class' => 'btn btn-primary btn-block']);?>

          </div>
      </div>
        
            <?php if ($dataProyek['status']=='tawaran diterima') { ?>
                
            <?php }elseif($dataProyek['status']=='proyek selesai' && $dataProyek['rating_proyek']==null) { ?>
        <div class="box box-primary pull-right">
          <div class="box-body">
            
            <?php
             $url = Url::to(['/proyek/proyekselesai', 'id' =>$dataProyek['id']]);
                        echo Html::a('<span class="fa fa-check"></span> Barikan Rating pembuat proyek ', FALSE, ['value' => $url,'class' => 'btn btn-success btn-block','id'=>'buttonViewPengalaman']);

                  Modal::begin([
                  'header' => '<h4>Rating proyek</h4>',
                  'id' => 'modalViewPengalaman',
                  'size' => 'modal-sm',
                    ]); 
                    echo "<div id='kontenViewPengalaman'></div>";
                   Modal::end()
            ?>
          </div>
        </div>
            <?php }elseif($dataProyek['status']=='proyek selesai'){ ?>
           
            <?php }else{} ?>
          

    </div>
    <?php if ($dataProyek['status']=='tawaran diterima') { ?>
        <div class="col-md-9 pull-right">
            <div class="callout callout-warning ">
              <h4>Status Proyek : <?=$dataProyek['status'] ?></h4>
              Selamat tawaran anda telah diterima, tunggu sampai pembuat proyek untuk menyelesaikan pembayarannya agar anda bisa segera bekerja
            </div>
        </div>
        <?php }elseif($dataProyek['status']=='dibayar owner'){ ?>
          <div class="col-md-9 pull-right">
              <div class="callout callout-info">
                <h4>Status Proyek : <?=$dataProyek['status'] ?></h4>
                  Pembuat proyek telah selesai melakukan pembayaran, sekarang anda bisa mengerjakan proyek anda.
              </div>
          </div>
        <?php }else{ ?>
        <div class="col-md-9 pull-right">
              <div class="callout callout-success">
                <h4>Status Proyek : <?=$dataProyek['status'] ?></h4>
                terimakasih telah menggunakan kreatifkita     
              </div>
          </div>
           <div class="col-md-9 pull-right">
            <div class="callout callout-success ">
              <h5>Rating pekerjaan : 
              <?php 
                  echo StarRating::widget([
                      'name' => 'rating_35',
                      'value' => $dataProyekDikerjakan['rating_pekerja'],
                      'disabled' => true
                  ]) ?>

              <b>Feedback:</b> <?=$dataProyekDikerjakan['feedback'] ?>
              </h5>
            </div>
           </div>
        <?php } ?>

        <div class="col-md-9 pull-right">
            <div class="box box-primary pull-right">
            <div class="box-header with-border">
          <h3 class="box-title">Proyek</h3>
          </div>
    <?= DetailView::widget([
        'model' => $dataProyek,
        'attributes' => [
            //'id',
            'judul',
            //'gambar',
            'keterangan:ntext',
            'created_at',
            //'updated_at',
            //'status',
            'deadline',
            //'rating_proyek',
            //'konfirmasi_pekerjaan',
            'kategoriBudget.jumlah_budget',
        ],
    ]) ?> 

        </div>
    </div>
        <div class="col-md-9 pull-right">
        <div class="box box-primary pull-right">
        <div class="box-header with-border">
          <h3 class="box-title">Pengerjaan</h3>
          </div>
          
          <?php echo DetailView::widget([
              'model' => $dataProyekDikerjakan,
              'attributes' => [
              //'jobdesk',
              //'status',
              //'feedback:ntext',
              //'rating_pekerja',
              'dana',
              'waktu',
              ],
            ]) ?>           
            </div>
            </div>



  </div>
</div>
</div>

