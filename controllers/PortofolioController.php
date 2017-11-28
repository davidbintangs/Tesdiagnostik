<?php

namespace app\controllers;

use Yii;
use app\models\Portofolio;
use app\models\PortofolioSearch;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * PortofolioController implements the CRUD actions for Portofolio model.
 */
class PortofolioController extends Controller
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
     * Lists all Portofolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortofolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $portofolio = new Portofolio();
        $portofolio = $portofolio->find()->all();

        return $this->render('index', [
            'portofolio'=>$portofolio,
        ]);
    }

    /**
     * Displays a single Portofolio model.
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
     * Creates a new Portofolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Portofolio();      


        if ($model->load(Yii::$app->request->post())) {

            //UPLOAD FOTO
            $model->save(false);
            $nama_foto ='portofolio_'.$model->id;
        
            $model->file_foto = UploadedFile::getInstance($model, 'file_foto');
            $model->file_foto->saveAs('dist/img/portofolio/'.$nama_foto.'.jpg',FALSE);
            $model->gambar = 'dist/img/portofolio/'.$nama_foto.'.jpg';
            $model->save(false);
                
         
            
            $model->tanggal =date('Y-m-d');
            $model->save(false);
                         
            if ($model->validate()) {
                Yii::$app->getSession()->setFlash('success','Gambar berhasil di uploud');
                return $this->redirect(['profil/index']);
            }else {
                 Yii::$app->getSession()->setFlash('success','Gambar berhasil di uploud');
                return $this->redirect(['profil/index']);
            
            }
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        return $this->renderAjax('create', [
                'model' => $model,
                ]);
    }
  
    /*public function actionCreate()
    {
        $identitas= new Identitas();
        $id=$identitas->getId();
        $model = new Portofolio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('../profil');
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'id'=>$id,
            ]);
        }
    }
    */
    /**
     * Updates an existing Portofolio model.
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
     * Deletes an existing Portofolio model.
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
     * Finds the Portofolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portofolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portofolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
