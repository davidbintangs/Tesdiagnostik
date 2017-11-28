<?php

namespace app\controllers;

use Yii;
use app\models\KeahlianIdentitas;
use app\models\KeahlianIdentitasSearch;
use app\models\JenisKeahlian;
use app\models\Keahlian;
use app\models\Identitas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * KeahlianIdentitasController implements the CRUD actions for KeahlianIdentitas model.
 */
class KeahlianIdentitasController extends Controller
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
     * Lists all KeahlianIdentitas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $JenisKeahlian= new JenisKeahlian();
        $searchModel = new KeahlianIdentitasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'JenisKeahlian'=>$JenisKeahlian,
        ]);
    }

    /**
     * Displays a single KeahlianIdentitas model.
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
     * Creates a new KeahlianIdentitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelKeahlian=new Keahlian();
        $JenisKeahlian= new JenisKeahlian();
        $model = new KeahlianIdentitas();
        $identitas= new Identitas();
        $id=$identitas->getId();
        $post = Yii::$app->request->post();

        if (!empty($post)) {
            $postModel = $post['KeahlianIdentitas'];
            $postModelMulti=  $postModel['pilKeahlian'];
            //$postModelMulti= $post['keahlian'];

            if ( !empty( $postModelMulti) ){
                foreach ($postModelMulti as $value) {

                    $newModel = new KeahlianIdentitas();
                    $newModel->keahlian = $value;
                    $newModel->identitas= $id;
                    $newModel->save();       
              }
                  // return $this->render('test', [
                  //   'postModelMulti' => $postModelMulti]);
            }
            return $this->redirect(['./profil']);

        } else {
            return $this->render('create', [
                'model' => $model,
                'JenisKeahlian'=>$JenisKeahlian,
            ]);
        }
    }

    /**
     * Updates an existing KeahlianIdentitas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateselect()
    {
        $identitas= new Identitas();
        $id=$identitas->getId();
        $model = ArrayHelper::map(KeahlianIdentitas::find()->where(['identitas'=>$id])->all(),'id','keahlian');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['profil']);
        } else {
            return $this->renderAjax('updateselect', [
                'model' => $model,
            ]);
        }
    }
    public function actionUpdate($id)
    {
     

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KeahlianIdentitas model.
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
     * Finds the KeahlianIdentitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeahlianIdentitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KeahlianIdentitas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
