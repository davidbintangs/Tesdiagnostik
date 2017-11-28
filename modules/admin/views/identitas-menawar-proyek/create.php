<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IdentitasMenawarProyek */

$this->title = Yii::t('app', 'Create Identitas Menawar Proyek');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Identitas Menawar Proyeks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identitas-menawar-proyek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
