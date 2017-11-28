<?php

if (Yii::$app->session->hasFlash('success')){
	echo '<br>Nama : '.$model->nama;
	echo '<br>Komentar :'.$model->komentar;
}
