<?php

namespace app\controllers;

use Yii;
use app\models\Bahasa;
use app\models\BahasaSearch;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BahasaController implements the CRUD actions for Bahasa model.
 */
class BahasaController extends Controller
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
     * Lists all Bahasa models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $searchModel = new BahasaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bahasa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bahasa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $identitas= new Identitas();
         $id=$identitas->getId();
        $model = new Bahasa();
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('../profil');
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'id'=>$id,
            ]);
        }
    }

    /**
     * Updates an existing Bahasa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $identitas= new Identitas();
        $id=$identitas->getId();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('../profil');
        } else {
            return $this->render('update', [
                'model' => $model,
                'id'=>$id,
            ]);
        }
    }

    /**
     * Deletes an existing Bahasa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['profil/index']);
    }

    /**
     * Finds the Bahasa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bahasa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bahasa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
