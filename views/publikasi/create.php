<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Publikasi */

$this->title = Yii::t('app', 'Create Publikasi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publikasis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publikasi-create">
    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
    ]) ?>

</div>
