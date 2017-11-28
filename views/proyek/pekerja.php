  <?php
	use yii\helpers\Html;
	use yii\widgets\Pjax;
	use yii\helpers\Url;
   //$data['profil']= $profil ?>
   <?php $email=Yii::$app->user->identity->email; 
        $username=Yii::$app->user->identity->username;
        $created=Yii::$app->user->identity->created_at;
 

 		$profil=$this->context->findPekerja($identitas); 
        $data['identitas']=$profil; 
        $member= $profil['member'];
        $dataMember = $this->context->getMember($member);
    ?>
             

        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="img img-responsive" src="<?php echo Url::base().'/'.$profil['foto'];?>" alt="User profile picture">
            

           <div class="box-body">
           <i class="fa fa-user margin-r-2"></i><b> <?php echo ' '.$profil['nama_depan'].' '.$profil['nama_belakang'].'</b> (@'.$dataMember['username'].')';?>
            <p class="text-muted">
         
            </p>
          	<p>
          <strong><i class="fa fa-envelope margin-r-2"></i><?=' '.$dataMember['email']; ?></strong>
           </p><p>
           <strong><i class="fa fa-phone-square margin-r-2"></i><?=' '.$profil['no_hp'] ?></strong>
          </p>
   
         
        </div>
            <?= Html::a('<span class="fa fa-user"></span> Lihat Profil', ['profil/member','id'=>$profil['id']], ['class' => 'btn btn-success btn-block']) ?>

            <?= Html::a('<span class="fa fa-rocket"></span> Rekrut', ['proyekdikerjakan','id'=>$id], ['class' => 'btn btn-primary btn-block']) ?>
        
           

         	
          </div>
        </div>
