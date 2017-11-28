<?php

namespace app\controllers;

use Yii;
use app\models\IdentitasMenawarProyek;
use app\models\IdentitasMenawarProyekSearch;
use app\models\Identitas;
use app\models\Proyek;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IdentitasMenawarProyekController implements the CRUD actions for IdentitasMenawarProyek model.
 */
class IdentitasMenawarProyekController extends Controller
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
     * Lists all IdentitasMenawarProyek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdentitasMenawarProyekSearch();
        $query =Yii::$app->request->queryParams;
        $kondisi =null;
        $dataProvider = $searchModel->search($query, $kondisi);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IdentitasMenawarProyek model.
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
     * Creates a new IdentitasMenawarProyek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $proyek = Proyek::findOne($id);


        $model = new IdentitasMenawarProyek();
        $identitas = new Identitas();
        $penawar = $identitas->getId();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at =date('Y-m-d');
            $model->proyek=$id;
            $model->identitas=$penawar;
            $proyek->status='ditawar';
            $proyek->save(false);
            $model->save();
           return $this->redirect(['./proyek/tawar', 'id' => $id]);
           } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IdentitasMenawarProyek model.
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
     * Deletes an existing IdentitasMenawarProyek model.
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
     * Finds the IdentitasMenawarProyek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IdentitasMenawarProyek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IdentitasMenawarProyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
