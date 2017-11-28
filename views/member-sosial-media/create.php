<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MemberSosialMedia */

$this->title = 'Create Member Sosial Media';
$this->params['breadcrumbs'][] = ['label' => 'Member Sosial Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-sosial-media-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
