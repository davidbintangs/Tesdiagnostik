<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisKeahlian */

$this->title = Yii::t('app', 'Create Jenis Keahlian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Keahlians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-keahlian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
