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
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2 style="text-align: center;"><strong><?=$identitas['nama_depan']?> <?=$identitas['nama_belakang'];?></strong></h2>
<p style="text-align: center;"><?=$identitas['alamat'].', '.$identitas['Kecamatan'].', '.$identitas['kota'].', '.$identitas['profinsi'].' ('.$identitas['kode_pos'].')'?>• <?=$identitas['no_hp']?>•<?=$email;?></p>
<br/>
<br/>
<strong>PENDIDIKAN</strong>
<?php 

	foreach ($pilPendidikan as $pilPendidikan) { ?>
		<p style="padding-left: 210px;"><b><?=$pilPendidikan['instansi'];?></b>, <?=$pilPendidikan['bidang'];?>, <?=$pilPendidikan['tahun_masuk'];?> - <?=$pilPendidikan['tahun_keluar'];?></p>
		
	<?php } ?>


<strong>PENGALAMAN</strong>
<?php 
	foreach ($pilPengalaman as $pilPengalaman) { ?>
		<p style="padding-left: 210px;"><strong><?=$pilPengalaman['judul'];?>, </strong><?=$pilPengalaman['perusahaan'];?></p>
		<p style="text-align: right; padding-left: 180px;"><?=$pilPengalaman['bulan_mulai'];?>, <?=$pilPengalaman['tahun_mulai'];?> - <?=$pilPengalaman['bulan_selesai'];?>, <?=$pilPengalaman['tahun_selesai'];?></p>
		<p style="padding-left: 210px;"><?=$pilPengalaman['ringkasan'];?></p>
		
	<?php } ?>

<strong>PUBLIKASI</strong>
<?php 

	foreach ($pilPublikasi as $pilPublikasi) { ?>
		<p style="padding-left: 210px;"><?=$identitas['nama_belakang'];?>, <?=$identitas['nama_depan'];?>, <?=$pilPublikasi['judul'];?>, <?=$pilPublikasi['penerbit'];?>, <?=$pilPublikasi['keterangan'];?></p>
		<p style="padding-left: 210px;"><?=$pilPublikasi['url'];?></p>
		
	<?php } ?>

<strong>SERTIVIKASI</strong>
<?php 

	foreach ($pilSertifikasi as $pilSertifikasi) { ?>
		<p style="padding-left: 210px;"><?=$pilSertifikasi['judul'];?>, <?=$pilSertifikasi['pemberi'];?>, <?=$pilSertifikasi['keterangan'];?></p>
		<p style="padding-left: 210px;"><?=$pilPublikasi['keterangan'];?></p>
		
	<?php } ?>
<hr />

<strong>PERSONAL</strong>

<p style="padding-left: 210px;"> <?=$identitas['ringkasan']?></p>
	
	<p style="padding-left: 210px;"><strong>Bahasa yang dikuasai</strong> :<?php foreach ($pilBahasa as $key => $pilBahasa) { echo $pilBahasa['bahasa'].', '; } ?></p>
	

<p style="padding-left: 210px;"><strong>Keahlian: </strong><?php foreach ($pilKeahlian as $key => $pilKeahlian) { echo $pilKeahlian['nama_keahlian'].', '; } ?></p>
</body>
</html>