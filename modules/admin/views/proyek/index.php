<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProyekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyeks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyek-index">
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Kategori Proyek</h3>
                    </div>
                    <div class="box-body">
                        <?php Pjax::begin(); ?>    <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    //'id',
                                    'judul',
                                    //'gambar',
                                    //'keterangan:ntext',
                                    'created_at',
                                    //'updated_at',
                                    'status',
                                     'deadline',
                                    // 'rating_proyek',
                                     'konfirmasi_pekerjaan',
                                    // 'kategori_budget',
                                    // 'identitas',

                                    ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
