<?php 
  
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;


$base = $_SERVER['REQUEST_URI'];
 ?>
<?php 
  $namaPembuat=$dataPembuatProyek['nama_depan'].' '.$dataPembuatProyek['nama_belakang'];
  $noHpPembuat=$dataPembuatProyek['no_hp'];
 ?>


<div class="proyek-view">
  <div class="body-content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary pull-right">
          <div class="box-header with-border">
          <h3 class="box-title">Freelancer</h3>
             <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
          </div>
          <div class="box-body box-profile">
            <img class="img img-responsive" src="<?php echo Url::base().'/'.$dataPenawar['foto'];?>" alt="User profile picture">
            
           <div class="box-body">
           <strong><i class="fa fa-user margin-r-5"></i><?=$dataPenawar['nama_depan'].' '.$dataPenawar['nama_belakang']; ?></strong>
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
          <p class="text-muted"><?=$dataPenawar['no_hp']?></p>
          <hr>
        </div>
                
             <?= Html::a(Yii::t('app', 'Lihat Profil'), ['profil/member', 'id' => $dataPenawar['id']], ['class' => 'btn btn-primary btn-block']);?>

          </div>
      </div>
    </div>
    <?php if ($dataProyek['status']=='tawaran diterima') { ?>
        <div class="col-md-9 pull-right">
            <div class="callout callout-warning ">
              <h4>Status Proyek : <?=$dataProyek['status'] ?></h4>
              Selamat anda telah merekrut seorang freelance, saatnya sekarang membayar proyek anda agar freelancer segera bekerja
            </div>
        </div>
        <?php }elseif($dataProyek['status']=='dibayar owner'){ ?>
          <div class="col-md-9 pull-right">
              <div class="callout callout-info">
                <h4>Status Proyek : <?=$dataProyek['status'] ?></h4>
                Proyek telah berhasil dibayar, sekarang saatnya para Freelancer bekerja dan merealisasikan projectmu menjadi kenyataan      
              </div>
          </div>
        <?php }else{ ?>
        <div class="col-md-9 pull-right">
              <div class="callout callout-success">
                <h4>Status Proyek : <?=$dataProyek['status'] ?></h4>  
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
              'model' => $dataDikerjakan,
              'attributes' => [
              //'jobdesk',
              //'status',
              //'feedback:ntext',
              //'rating_pekerja',
              'dana',
              'waktu',
              ],
            ]) ?>

          <?php if ($dataProyek['status']=='tawaran diterima') { ?>
                <button class="btn btn-danger btn-block" id="pay-button">Bayar Proyek</button>
                <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 
            <?php }elseif($dataProyek['status']=='dibayar owner') { ?>
            <?php
             $url = Url::to(['/identitas-mengerjakan-proyek/proyekselesai', 'id' =>$id]);
                        echo Html::a('<span class="fa fa-check"></span> Konfrimasi Pekerjaan Selesai ', FALSE, ['value' => $url,'class' => 'btn btn-success btn-block','id'=>'buttonViewPengalaman']);

                  Modal::begin([
                  'header' => '<h4>Proyek Telah selesai, saatnya beri penilaian untuk freelancer</h4>',
                  'id' => 'modalViewPengalaman',
                  'size' => 'modal-sm',
                    ]); 
                    echo "<div id='kontenViewPengalaman'></div>";
                   Modal::end()
            ?>
            <?php }else{} ?>
            <?php
              $url=Url::base().'/payment/Veritrans.php';
              require_once('payment/Veritrans.php');  
              //Set Your server key
              Veritrans_Config::$serverKey = "VT-server-RYDNb-GyHQWpTJSxcPFBK-qv";

              // Uncomment for production environment
              // Veritrans_Config::$isProduction = true;

              // Enable sanitization
              Veritrans_Config::$isSanitized = true;

              // Enable 3D-Secure
              Veritrans_Config::$is3ds = true;

              // Required
              $transaction_details = array(
                'order_id' => rand(),
                'gross_amount' => 94000, // no decimal allowed for creditcard
              );

              // Optional
              $item1_details = array(
                'id' => $dataDikerjakan['id'],
                'price' => $dataDikerjakan['dana'],
                'quantity' => 1,
                'name' => $dataProyek['judul']
              );

              // Optional

              // Optional
              $item_details = array ($item1_details);

              // Optional
              $billing_address = array(
                'first_name'    => "Andri",
                'last_name'     => "Litani",
                'address'       => "Mangga 20",
                'city'          => "Jakarta",
                'postal_code'   => "16602",
                'phone'         => "081122334455",
                'country_code'  => 'IDN'
              );


              // Optional
              $customer_details = array(
                'first_name'    => $dataPembuatProyek['nama_depan'],
                'last_name'     => $dataPembuatProyek['nama_belakang'],
                'email'         => "davidbintangs@gmail.com",
                'phone'         => $noHpPembuat,
                'billing_address'  => $billing_address,
               
              );

              // Fill transaction details
              $transaction = array(
                
                'transaction_details' => $transaction_details,
                'customer_details' => $customer_details,
                'item_details' => $item_details,
              );

              $snapToken = Veritrans_Snap::getSnapToken($transaction);
              ?>

           <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="VT-client-d8aROXgeUcdBXEjp"></script>
            <script type="text/javascript">
              document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?=$snapToken?>', {
                  // Optional
                  onSuccess: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);

                  },
                  // Optional
                  onPending: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  },
                  // Optional
                  onError: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                  }
                });
              };
            </script>


            </div>
            </div>



  </div>
</div>
</div>

