<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Questions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Question'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'question_1:ntext',
            'question_2:ntext',
            'picture_question_1',
            'picture_question_2',
            // 'option_a:ntext',
            // 'option_b:ntext',
            // 'option_c:ntext',
            // 'option_d:ntext',
            // 'option_e:ntext',
            // 'picture_a',
            // 'picture_b',
            // 'picture_c',
            // 'picture_d',
            // 'picture_e',
            // 'answer_question',
            // 'reason_1:ntext',
            // 'reason_2:ntext',
            // 'reason_3:ntext',
            // 'reason_4:ntext',
            // 'reason_5:ntext',
            // 'answer_reason',
            // 'misconceptions_a:ntext',
            // 'misconceptions_b:ntext',
            // 'misconceptions_c:ntext',
            // 'misconceptions_d:ntext',
            // 'misconceptions_e:ntext',
            // 'misconceptions_f:ntext',
            // 'status',
            // 'test',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
