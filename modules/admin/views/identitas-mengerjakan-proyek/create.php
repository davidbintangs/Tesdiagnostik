<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IdentitasMengerjakanProyek */

$this->title = Yii::t('app', 'Create Identitas Mengerjakan Proyek');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas Mengerjakan Proyeks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-mengerjakan-proyek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
