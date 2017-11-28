<?php


use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = $model->id;
?>
<?php 
    $identiti=$model->identitas;
	$pembuatProyek = $this->context->pembuatProyek($identiti);
    $data['pembuatProyek']= $pembuatProyek; 

    $member = $this->context->member($identiti);
    $data['member']=$member;

    $kondisi = $model->id;
    $dataPenawar = $this->context->dataPenawar($kondisi);
 ?>
<div class="proyek-view">
  <div class="body-content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary pull-right">
          <div class="box-body box-profile">
             <img class="img img-responsive" src="<?php echo Url::base().'/'.$pembuatProyek['foto'];?>" alt="User profile picture">
            
           <div class="box-body">
           <strong><i class="fa fa-user margin-r-5"></i>Pembuat Proyek</strong>
            <p class="text-muted">
                <?=$pembuatProyek['nama_depan'].' '.$pembuatProyek['nama_belakang'].' <b> <br/>@'.$member['username'].'</b';?>
            </p>
            <hr>
          <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
            <p class="text-muted">
                <?=$member['email'];?>
            </p>
            <hr>
          <strong><i class="fa fa-phone-square margin-r-5"></i> HP</strong>
          <p class="text-muted"><?=$pembuatProyek['no_hp']?></p>
          <hr>
        </div>
                
             <?= Html::a(Yii::t('app', 'Lihat Profil'), ['profil/member', 'id' => $pembuatProyek['id']], ['class' => 'btn btn-primary btn-block']);?>
   

                     

          </div>
        </div>
        </div>
         <div class="col-md-9">
        <div class="box box-primary pull-right">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'judul',
            //'gambar',
            'keterangan:ntext',
            'created_at',
            //'updated_at',
            'status',
            'deadline',
            //'rating_proyek',
            //'konfirmasi_pekerjaan',
            'kategoriBudget.jumlah_budget',
        ],
    ]) ?>
    </div>
    </div>
    <div class="col-md-9">
    <div class="box box-primary box-solid">
    <div class="box-header with-border">
          <h3 class="box-title">Penawar</h3>
    </div>
    <div class="box-body">
   	<?php 
	   	
   	 ?>
     <?php 
      if ($model['status']=='published') {
        $atribut='{rekrut}';
      }else{
        $atribut='{rekrut}';
      }


      ?>

   	 <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataPenawar,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'identitas0.nama_depan',
            //'proyek',
            'dana',
            'pesan:ntext',
            // 'file',
             'waktu',
            'created_at',
          
            [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Actions',
                    'template' => $atribut,
                    'buttons' => [
                    'rekrut' => function ($url, $model) { 
                    $url = Url::to(['pekerja', 'id' => $model->id,'identitas'=>$model->identitas]);
                     return Html::button('<span class="fa fa-rocket"></span> Rekrut',['value' => $url,'class' => 'btn btn-primary btn-block','id'=>'buttonViewPengalaman']);
                    },
                ]
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
    <?php
                  Modal::begin([
                  'header' => '<h4>Rekrut Pekerja ?</h4>',
                  'id' => 'modalViewPengalaman',
                  'size' => 'modal-sm',
                    ]); 
                   echo "<div id='kontenViewPengalaman'></div>";
                   Modal::end()

              ?>
    </div>
    </div>
    </div>

</div>
</div>
</div>
