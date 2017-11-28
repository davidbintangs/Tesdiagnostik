<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pengalaman */

$this->title = Yii::t('app', 'Create Pengalaman');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pengalamen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengalaman-create">
    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,
    ]) ?>

</div>
