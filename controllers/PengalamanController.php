<?php

namespace app\controllers;

use Yii;
use app\models\Pengalaman;
use app\models\PengalamanSearch;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengalamanController implements the CRUD actions for Pengalaman model.
 */
class PengalamanController extends Controller
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
     * Lists all Pengalaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PengalamanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengalaman model.
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
     * Creates a new Pengalaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $identitas= new Identitas();
        $identiti=$identitas->getId();
        $model = new Pengalaman();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['./profil']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'identiti'=>$identiti,
            ]);
        }
    }

    /**
     * Updates an existing Pengalaman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $identitas= new Identitas();
        $identiti=$identitas->getId();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('../profil');
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'identiti'=>$identiti,
            ]);
        }
    }

    /**
     * Deletes an existing Pengalaman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['./profil']);
    }

    /**
     * Finds the Pengalaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengalaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengalaman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
