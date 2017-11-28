<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Keahlian */

$this->title = Yii::t('app', 'Create Keahlian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Keahlians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keahlian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
