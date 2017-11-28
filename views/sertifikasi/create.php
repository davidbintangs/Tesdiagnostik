<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sertifikasi */

$this->title = Yii::t('app', 'Create Sertifikasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sertifikasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sertifikasi-create">
    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
    ]) ?>

</div>
