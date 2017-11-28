<?php

namespace app\controllers;

use Yii;
use app\models\Sertifikasi;
use app\models\SertifikasiSearch;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SertifikasiController implements the CRUD actions for Sertifikasi model.
 */
class SertifikasiController extends Controller
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
     * Lists all Sertifikasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SertifikasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sertifikasi model.
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
     * Creates a new Sertifikasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $identitas= new Identitas();
        $identiti=$identitas->getId();
        $model = new Sertifikasi();      

        if ($model->load(Yii::$app->request->post())) {

            //UPLOAD FOTO
            $model->save(false);
            $nama_foto ='sertifikat_'.$model->id;
        
            $model->file_sertifikat = UploadedFile::getInstance($model, 'file_sertifikat');
            $model->file_sertifikat->saveAs('dist/img/sertifikat/'.$nama_foto.'.jpg',FALSE);
            $model->sertifikat = 'dist/img/sertifikat/'.$nama_foto.'.jpg';
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
     * Updates an existing Sertifikasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $identitas=new Identitas();
        $identiti= $identitas->getId();
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
     * Deletes an existing Sertifikasi model.
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
     * Finds the Sertifikasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sertifikasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sertifikasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
