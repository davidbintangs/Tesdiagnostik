<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\IdentitasMengerjakanProyek;
use app\modules\admin\models\IdentitasMengerjakanProyekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Proyek;

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

        $this->layout="main";
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
        $this->layout="main";
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
            $this->layout="main";
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionBayar($id)
    {

        $bayar = $this->findModel($id);
        $bayar->status ='dibayar owner';
        
        $idproyek =$bayar->proyek;
        $proyek =$this->findProyek($idproyek);
        $proyek->status='dibayar owner';
        
        $bayar->save(false);
        $proyek->save(false);
        return $this->redirect(['index']);
    }

    public function findProyek($id)
    {
        if (($model = Proyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
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
}
