<?php

namespace app\controllers;

use Yii;
use app\models\Pendidikan;
use app\models\PendidikanSearch;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PendidikanController implements the CRUD actions for Pendidikan model.
 */
class PendidikanController extends Controller
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
     * Lists all Pendidikan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PendidikanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pendidikan model.
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
     * Creates a new Pendidikan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $identitas= new Identitas();
        $identiti=$identitas->getId();
        $model = new Pendidikan();      

        if ($model->load(Yii::$app->request->post())) {

            //UPLOAD FOTO
            $model->save(false);
            $nama_foto ='ijazah_'.$model->id;
        
            $model->file_ijazah = UploadedFile::getInstance($model, 'file_ijazah');
            $model->file_ijazah->saveAs('dist/img/ijazah/'.$nama_foto.'.jpg',FALSE);
            $model->ijazah = 'dist/img/ijazah/'.$nama_foto.'.jpg';
            $model->save(false);
                
                         
            if ($model->validate()) {
                Yii::$app->getSession()->setFlash('success','Gambar berhasil di uploud');
                return $this->redirect(['profil/index']);
            }else {
                 Yii::$app->getSession()->setFlash('success','Gambar berhasil di uploud');
                return $this->redirect(['profil/index']);
            
            }
        }else {
            return $this->renderAjax('create', [
                'model' => $model,
                'identiti'=>$identiti,
            ]);
        }
        return $this->renderAjax('create', [
                'model' => $model,
                'identiti'=>$identiti,
            ]);
    }
    /**
     * Updates an existing Pendidikan model.
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
            return $this->renderAjax('update', [
                'model' => $model,
                'identiti'=>$identiti,
            ]);
        }
    }

    /**
     * Deletes an existing Pendidikan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/profil']);
    }

    /**
     * Finds the Pendidikan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pendidikan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pendidikan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
