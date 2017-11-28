<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proyek */

$this->title = 'Update Proyek: ' . $model->id;
?>
<div class="proyek-update">

    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
    ]) ?>

</div>
