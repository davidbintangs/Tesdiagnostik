<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Portofolio */

$this->title = Yii::t('app', 'Create Portofolio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Portofolios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portofolio-create">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
