<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bahasa */

$this->title = Yii::t('app', 'Create Bahasa');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bahasas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahasa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
