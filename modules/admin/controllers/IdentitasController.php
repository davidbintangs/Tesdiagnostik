<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Identitas;
use app\models\IdentitasSearch;
use app\models\Keahlian;
use app\models\Bahasa;
use app\models\KeahlianIdentitas;
use app\models\JenisKeahlian;
use app\models\IdentitasMengerjakanProyek;
use app\models\Proyek;
use app\models\ProyekSearch;
use app\models\Pengalaman;
use app\models\PengalamanSearch;
use app\models\Pendidikan;
use app\models\PendidikanSearch;
use app\models\Sertifikasi;
use app\models\SertifikasiSearch;
use app\models\Publikasi;
use app\models\PublikasiSearch;
use app\models\Portofolio;
use app\models\PortofolioSearch;
use app\models\Member;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\widget\Pjax;

/**
 * IdentitasController implements the CRUD actions for Identitas model.
 */
class IdentitasController extends Controller
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
     * Lists all Identitas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IdentitasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->layout="main";
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Identitas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
            $keahlian= new Keahlian();
            $identitas= new Identitas();
            $bahasa=new Bahasa();
            $IdentitasMProyek = new IdentitasMengerjakanProyek();
            $keahlianIdentitas= new KeahlianIdentitas();
            $proyek= new Proyek();
            $pengalaman = new Pengalaman();
            $jenisKeahlian= new JenisKeahlian();
            $pendidikan = new Pendidikan();
            $sertifikasi= new Sertifikasi();
            $publikasi= new Publikasi();
            $portofolio = new Portofolio();
            $searchModel = new IdentitasSearch();
            $member =new Member();
            $member = $member->getMember($id);
            $params=Yii::$app->request->queryParams;


            $dataProvider = $searchModel->search($params);
            $searchPengalaman = new PengalamanSearch();
            $dataPengalaman = $searchPengalaman->member($params,$id);
            $searchPendidikan = new PendidikanSearch();
            $dataPendidikan = $searchPendidikan->member($params,$id);
            $searchSertifikasi = new SertifikasiSearch();
            $dataSertifikasi = $searchSertifikasi->member($params,$id);
            $searchPublikasi = new PublikasiSearch();
            $dataPublikasi = $searchPublikasi->member($params,$id);
            $searchProyek = new ProyekSearch();
            $pembuat=null;
            $query =Yii::$app->request->queryParams;
            $dataProyek = $searchModel->search($query, $pembuat);
            
            $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/');

            $pilKeahlian = $keahlian->getPilKeahlian($id);

            $pilProyek= $proyek->getPilProyek($id);
            //$feedback=$IdentitasMProyek->getId($id);
            $pilKeahlian = $keahlian->getPilKeahlian($id);
            
            $pilBahasa=$bahasa->getPilBahasa($id);

             $this->layout="main";
            return $this->render('member', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'identitas' => $this->findModel($id),
                'pilKeahlian'=>$pilKeahlian,
                'jenisKeahlian'=>$jenisKeahlian,
                'directoryAsset'=>$directoryAsset,
                'dataPengalaman'=>$dataPengalaman,
                'dataPendidikan'=>$dataPendidikan,
                'dataSertifikasi'=>$dataSertifikasi,
                'dataPublikasi'=>$dataPublikasi,
                'searchProyek'=>$searchProyek,
                'dataProyek'=>$dataProyek,
                'pilBahasa'=>$pilBahasa,
                'member'=>$member,
                ]);   
        
    }

    /**
     * Creates a new Identitas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Identitas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Identitas model.
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

    /**
     * Deletes an existing Identitas model.
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
     * Deletes an existing Identitas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionVerifikasi($id)
    {
        $verifikasi = $this->findModel($id);
        $verifikasi->status_verifikasi ='terverifikasi';
        $verifikasi->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Identitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Identitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Identitas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
