<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pendidikan */

$this->title = Yii::t('app', 'Create Pendidikan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pendidikans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pendidikan-create">

    <?= $this->render('_form', [
        'model' => $model,
        'identiti'=>$identiti,

    ]) ?>

</div>
