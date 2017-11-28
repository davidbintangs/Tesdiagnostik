<?php

namespace app\controllers;

use Yii;
use app\models\IdentitasMengerjakanProyek;
use app\models\IdentitasMenawarProyek;
use app\models\IdentitasMengerjakanProyekSearch;
use app\models\Proyek;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IdentitasMengerjakanProyekController implements the CRUD actions for IdentitasMengerjakanProyek model.
 */
class IdentitasMengerjakanProyekController extends Controller
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
     * Lists all IdentitasMengerjakanProyek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdentitasMengerjakanProyekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IdentitasMengerjakanProyek model.
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
     * Creates a new IdentitasMengerjakanProyek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IdentitasMengerjakanProyek();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


   public function actionProyekselesai($id)
    {
        $data = new IdentitasMengerjakanProyek();
        $idm=new IdentitasMenawarProyek();
        $idm = $this->findIdm($id);
        $idm_proyek= $idm->proyek;
        $proyek = $this->findProyek($idm_proyek);
        $identitas =$this->findIdentitas($idm->identitas);
        
        $m_proyek= $data->getMengerjakan($idm_proyek);
        $idmengerjakan=$m_proyek['id'];
        $model = $this->findModel($idmengerjakan);
         //$model = new IdentitasMengerjakanProyek();


        if ($model->load(Yii::$app->request->post())) {
            //$m_proyek['id']='proyek selesai';
            $model->status ='proyek selesai';
            $proyek->status='proyek selesai';
            $proyek->save(false);
            $model->save(false);

            $sql = "SELECT COUNT(*) FROM identitas_mengerjakan_proyek WHERE identitas =".$idm->identitas;
            $sql2 = "SELECT * FROM identitas_mengerjakan_proyek WHERE identitas =".$idm->identitas;
            $jumlah_proyek = Yii::$app->db->createCommand($sql)->queryScalar();
            $total_proyek = Yii::$app->db->createCommand($sql2)->queryAll();
            $total_rating=0;    
            
            foreach ($total_proyek as $rating) {
                $total_rating=$total_rating+$rating['rating_pekerja'];
            }

            $total_rating=$total_rating/$jumlah_proyek;
            //menyimpan pada tabel identitas
             $identitas->rating_pekerja=$total_rating;
             $identitas->save(false);



            return $this->redirect(['/proyek/proyekdikerjakan','id'=>$id]);
        } else {
            return $this->renderAjax('proyekselesai', [
                'model' => $model,
                'id'=>$id,
            ]);
        }
    }

    /**
     * Updates an existing IdentitasMengerjakanProyek model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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
     * Deletes an existing IdentitasMengerjakanProyek model.
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
     * Finds the IdentitasMengerjakanProyek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IdentitasMengerjakanProyek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IdentitasMengerjakanProyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findProyek($id)
    {
        if (($model = Proyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findIdm($id)
    {
        if (($model = IdentitasMenawarProyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

        protected function findIdentitas($id)
    {
        if (($model = Identitas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
