<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'question_1:ntext',
            'question_2:ntext',
            'picture_question_1',
            'picture_question_2',
            'option_a:ntext',
            'option_b:ntext',
            'option_c:ntext',
            'option_d:ntext',
            'option_e:ntext',
            'picture_a',
            'picture_b',
            'picture_c',
            'picture_d',
            'picture_e',
            'answer_question',
            'reason_1:ntext',
            'reason_2:ntext',
            'reason_3:ntext',
            'reason_4:ntext',
            'reason_5:ntext',
            'answer_reason',
            'misconceptions_a:ntext',
            'misconceptions_b:ntext',
            'misconceptions_c:ntext',
            'misconceptions_d:ntext',
            'misconceptions_e:ntext',
            'misconceptions_f:ntext',
            'status',
            'test',
        ],
    ]) ?>

</div>
