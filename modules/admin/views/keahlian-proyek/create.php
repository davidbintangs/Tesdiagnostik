<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeahlianProyek */

$this->title = 'Create Keahlian Proyek';
$this->params['breadcrumbs'][] = ['label' => 'Keahlian Proyeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keahlian-proyek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
