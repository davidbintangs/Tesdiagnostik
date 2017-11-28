<?php

namespace app\controllers;

use Yii;
use app\models\KeahlianProyek;
use app\models\Keahlian;
use app\models\JenisKeahlian;
use app\models\KeahlianProyekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KeahlianProyekController implements the CRUD actions for KeahlianProyek model.
 */
class KeahlianProyekController extends Controller
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
     * Lists all KeahlianProyek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KeahlianProyekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KeahlianProyek model.
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
     * Creates a new KeahlianProyek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $modelKeahlian=new Keahlian();
        $JenisKeahlian= new JenisKeahlian();
        $model = new KeahlianProyek();
        $post = Yii::$app->request->post();


        if (!empty($post)) {
           $postModel = $post['KeahlianProyek'];
            $postModelMulti=  $postModel['pilKeahlian'];
            

        if ( !empty( $postModelMulti) ){
            foreach ($postModelMulti as $value) {

                $newModel = new KeahlianProyek();
                $newModel->keahlian = $value;
                $newModel->proyek= $id;
                $newModel->save();       
            }
        }
            return $this->redirect(['./proyek/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'id'=>$id,
            ]);
        }
    }

 
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KeahlianProyek model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KeahlianProyek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeahlianProyek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KeahlianProyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
