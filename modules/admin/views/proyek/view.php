<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Identitas;
use app\models\Member;
use app\models\IdentitasMenawarProyek;
use app\models\IdentitasMenawarProyekSearch;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php 
    $identitas = new Identitas();
    $member = new Member();

    $id=$model->identitas;
    $idproyek=$model->id;

    $searchModel = new IdentitasMenawarProyekSearch();
    $menawarProyek = new IdentitasMenawarProyek;

    $query= Yii::$app->request->queryParams;
    $kondisi = $model->id;
    $dataPenawar = $searchModel->search($query,$kondisi);

    $pembuatProyek = $identitas->findOne($id);
    $data['pembuatProyek']= $pembuatProyek; 
    $idmember= $pembuatProyek['member'];
    
    $member = $member->findOne($idmember);
    $data['member']=$member;
 ?>
<div class="proyek-view">
  <div class="body-content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary pull-right">
          <div class="box-body box-profile">
            <img class="img img-responsive" src="site/images/t2.jpg" alt="User profile picture">
            
           <div class="box-body">
           <strong><i class="fa fa-user margin-r-5"></i>Pembuat Proyek</strong>
            <p class="text-muted">
                <?=$pembuatProyek['nama_depan'].' '.$pembuatProyek['nama_belakang'].' <b> <br/>@'.$member['username'].'</b';?>
            </p>
            <hr>
          <strong><i class="fa fa-book margin-r-5"></i>Email</strong>
            <p class="text-muted">
                <?=$member['email'];?>
            </p>
            <hr>
          <strong><i class="fa fa-map-marker margin-r-5"></i> HP</strong>
          <p class="text-muted"><?=$pembuatProyek['no_hp']?></p>
          <hr>
          
        </div>

            <?= Html::button('Lihat Profil', ['value' => Url::to('/profil'),'class' => 'btn btn-primary btn-block']) ?>

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
            'gambar',
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
    <div class="col-md-12">
    <div class="box box-primary box-solid">
    <div class="box-header with-border">
          <h3 class="box-title">Penawar</h3>
    </div>
    <div class="box-body">
    <?php 
        
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
            //'pesan:ntext',
            // 'file',
             'waktu',
            'created_at',
            

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
    </div>
    </div>
    </div>

</div>
</div>
</div>
