<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Identitas */

$this->title = Yii::t('app', 'Create Identitas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
