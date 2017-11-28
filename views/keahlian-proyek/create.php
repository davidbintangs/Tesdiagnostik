<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeahlianProyek */

$this->title = Yii::t('app', 'Create Keahlian Proyek');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Keahlian Proyeks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keahlian-proyek-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
