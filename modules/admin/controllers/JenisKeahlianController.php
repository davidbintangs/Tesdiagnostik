<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\JenisKeahlian;
use app\modules\admin\models\JenisKeahlianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenisKeahlianController implements the CRUD actions for JenisKeahlian model.
 */
class JenisKeahlianController extends Controller
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
     * Lists all JenisKeahlian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisKeahlianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new JenisKeahlian();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) { 
            $model = new JenisKeahlian();
            $alert=1;
            $this->layout="main";
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model'=>$model,
                'alert'=>$alert,
            ]);
        } else {
            
            $alert=0;
            $this->layout="main";
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model'=>$model,
                'alert'=>$alert,
            ]);
        }
    }

    /**
     * Displays a single JenisKeahlian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new JenisKeahlian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout="main";
        $model = new JenisKeahlian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('../keahlian/index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JenisKeahlian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $this->layout="main";
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JenisKeahlian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
           return $this->redirect('index');
    }

    /**
     * Finds the JenisKeahlian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JenisKeahlian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JenisKeahlian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
