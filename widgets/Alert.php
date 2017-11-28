<?php
namespace app\widgets;
use Yii;
class Alert extends \yii\bootstrap\Widget {
	public function init(){
		if (Yii::$app->session->hasFlash('success')){
			echo '<div class="alert alert-success">';
			echo Yii::$app->session->getFlash('success');
			echo '</div>';
		}
		elseif (Yii::$app->session->hasFlash('error')) {
			echo '<div class "alert alert-error">';
			echo Yii::$app->session->getFlash('error');
			echo '</div>';
		}
	}
}