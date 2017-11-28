<?php

namespace app\controllers;

use Yii;
use app\models\Identitas;
use app\models\IdentitasSearch;
use app\models\ProfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * IdentitasController implements the CRUD actions for Identitas model.
 */
class FreelanceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Identitas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdentitasSearch();
        $dataProvider = new Identitas();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $query = Identitas::find();
	    $countQuery = clone $query;
	    $pages = new Pagination([
	    	'defaultPageSize'=>10,
	    	'totalCount' => $countQuery->count()
	    	]);
	    $model = $query->orderBy('id')
	    	->offset($pages->offset)
	        ->limit($pages->limit)
	        ->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'pages'=>$pages,
        ]);
    }
}
