<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bahasa */

$this->title = 'Create Bahasa';
$this->params['breadcrumbs'][] = ['label' => 'Bahasas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahasa-create">
    <?= $this->render('_form', [
        'model' => $model,
        'id'=>$id,
    ]) ?>

</div>
