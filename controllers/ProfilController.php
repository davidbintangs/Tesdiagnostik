<?php

namespace app\controllers;

use Yii;
use kartik\mpdf\Pdf;
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
use app\models\Kodepos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\widget\Pjax;
use \yii\helpers\Url;

/**
 * IdentitasController implements the CRUD actions for Identitas model.
 */
class ProfilController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
                'access' => [
                        'class' => AccessControl::className(),
                        
                        'rules' => [
                            [
                                //'actions'=>['index','logout'],
                                'allow'=>true,
                                'roles'=>['@']
                            ],
                        ]
                ],

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
        $kodepos= new Kodepos();
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
        $id=$identitas->getId();
        $searchModel = new IdentitasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchPengalaman = new PengalamanSearch();
        $dataPengalaman = $searchPengalaman->search(Yii::$app->request->queryParams);
        $searchPendidikan = new PendidikanSearch();
        $dataPendidikan = $searchPendidikan->search(Yii::$app->request->queryParams);
        $searchSertifikasi = new SertifikasiSearch();
        $dataSertifikasi = $searchSertifikasi->search(Yii::$app->request->queryParams);
        $searchPublikasi = new PublikasiSearch();
        $dataPublikasi = $searchPublikasi->search(Yii::$app->request->queryParams);
        $searchProyek = new ProyekSearch();
        $pembuat=null;
        $query =Yii::$app->request->queryParams;
        $dataProyek = $searchModel->search($query, $pembuat);
        
        $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/');

        if (empty($id)){
            if ($identitas->load(Yii::$app->request->post()) && $identitas->save()) {
                return $this->redirect('./profil');
            } else {
                
                return $this->render('create', [
                    'model' => $identitas,
                    
                ]);
            }     
        }
        $pilKeahlian = $keahlian->getPilKeahlian($id);
        
        if (empty($pilKeahlian)){
                if ($keahlianIdentitas->load(Yii::$app->request->post()) && $keahlianIdentitas->save()) {
                    return $this->redirect('profil');
                } else {
                    return $this->redirect(['keahlian-identitas/create']);
                    
                }
            }
        
        else{
            $pilProyek= $proyek->getPilProyek($id);
            //$feedback=$IdentitasMProyek->getId($id);
            $pilKeahlian = $keahlian->getPilKeahlian($id);
            $pilProyek= $proyek->getPilProyek($id);
          $pilPengalaman=$pengalaman->getPilPengalaman($id);
            $pilPendidikan=$pendidikan->getPilPendidikan($id);
            $pilSertifikasi=$sertifikasi->getPilSertifikasi($id);
            $pilPublikasi=$publikasi->getPilPublikasi($id);
            $pilPortofolio=$portofolio->getPilPortofolio($id);
            $pilBahasa=$bahasa->getPilBahasa($id);
            return $this->render('view', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'identitas' => $this->findModel($id),
                'pilKeahlian'=>$pilKeahlian,
                'pilProyek'=>$pilProyek,
                'jenisKeahlian'=>$jenisKeahlian,
                //'feedback'=>$feedback,
                'pilPengalaman'=>$pilPengalaman,
                'pilPendidikan'=>$pilPendidikan,
                'pilSertifikasi'=>$pilSertifikasi,
                'pilPublikasi'=>$pilPublikasi,
                'pilPortofolio'=>$pilPortofolio,
                'directoryAsset'=>$directoryAsset,
                'searchPengalaman'=>$searchPengalaman,
                'dataPengalaman'=>$dataPengalaman,
                'searchPendidikan'=>$searchPendidikan,
                'dataPendidikan'=>$dataPendidikan,
                'searchSertifikasi'=>$searchSertifikasi,
                'dataSertifikasi'=>$dataSertifikasi,
                'searchPublikasi'=>$searchPublikasi,
                'dataPublikasi'=>$dataPublikasi,
                'searchProyek'=>$searchProyek,
                'dataProyek'=>$dataProyek,
                'pilBahasa'=>$pilBahasa,
                ]);   
        }
    }

    /**
     * Displays a single Identitas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderajax('view', [
            'model' => $this->findModel($id),
        ]);
    }

     /**
     * Displays a data profil from another member acces
     * @param integer $id
     * @return mixed
     */
    public function actionMember($id)
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
            $pilPortofolio=$portofolio->getPilPortofolio($id);
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

            
            return $this->render('member', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'identitas' => $this->findModel($id),
                'pilKeahlian'=>$pilKeahlian,
                'pilPortofolio'=>$pilPortofolio,
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
                'id'=>$id,
                ]);   
        
    }
    public function actionUpload(){


       //print_r($_FILES['images']);

    if (empty($_FILES['name'])) {
        echo json_encode(['error'=>'No files found for pload.']); 
        // or you can throw an exception 
        return; // terminate
    }else{
        echo  json_encode(['error'=>'files available for upload']);
    }
     }

    // public function actionCreate()
    // {
    //     $model = new Identitas();      
        

    //     if ($model->load(Yii::$app->request->post())) {

    //         //UPLOAD FOTO
    //         $model->save(false);
    //         $nama_foto ='member_'.$model->member;
    //         $model->file_foto = UploadedFile::getInstance($model, 'file_foto',FALSE);
    //         $model->file_foto->saveAs('dist/img/'.$nama_foto.'.jpg',FALSE);
    //         $model->foto = 'dist/img/'.$nama_foto.'.jpg';
    //         $model->save(false);
                         
    //         if ($model->validate()) {
    //             Yii::$app->getSession()->setFlash('success','Gambar berhasil di uploud');
    //             return $this->redirect('index');
    //         }else {
    //              Yii::$app->getSession()->setFlash('success','Gambar gagal di uploud');
    //             return $this->redirect('create');
            
    //         }
    //     } else {
    //         return $this->renderAjax('create', [
    //             'model' => $model,
    //         ]);
    //     }
    //     return $this->renderAjax('create', [
    //             'model' => $model,
    //             ]);
    // }


    
    public function dataProyekSaya($id){
        $proyek = new Proyek();
        $dataProvider = $proyek->findOne($id);
        return $dataProvider;
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
            return $this->redirect('index');
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionPekerja($id){
        $identitas= new Identitas();
        $profil = $identitas->getPekerja($id);
        //$profil = $this->findPekerja($id);
        return $this->renderAjax('pekerja', [
            'profil'=>'$profil',
        ]);
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
    
 
    public function actionPrint() {
        // get your HTML raw content without any layouts or scripts
        $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@web/');
        $kodepos= new Kodepos();
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
        $id=$identitas->getId();
        $searchModel = new IdentitasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchPengalaman = new PengalamanSearch();
        $dataPengalaman = $searchPengalaman->search(Yii::$app->request->queryParams);
        $searchPendidikan = new PendidikanSearch();
        $dataPendidikan = $searchPendidikan->search(Yii::$app->request->queryParams);
        $searchSertifikasi = new SertifikasiSearch();
        $dataSertifikasi = $searchSertifikasi->search(Yii::$app->request->queryParams);
        $searchPublikasi = new PublikasiSearch();
        $dataPublikasi = $searchPublikasi->search(Yii::$app->request->queryParams);
        $searchProyek = new ProyekSearch();
        $pembuat=null;
        $query =Yii::$app->request->queryParams;
        $dataProyek = $searchModel->search($query, $pembuat);
        $pilProyek= $proyek->getPilProyek($id);
            //$feedback=$IdentitasMProyek->getId($id);
            $pilKeahlian = $keahlian->getPilKeahlian($id);
            $pilProyek= $proyek->getPilProyek($id);
          $pilPengalaman=$pengalaman->getPilPengalaman($id);
            $pilPendidikan=$pendidikan->getPilPendidikan($id);
            $pilSertifikasi=$sertifikasi->getPilSertifikasi($id);
            $pilPublikasi=$publikasi->getPilPublikasi($id);
            $pilPortofolio=$portofolio->getPilPortofolio($id);
            $pilBahasa=$bahasa->getPilBahasa($id);
        $content = $this->renderPartial('_printView',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'identitas' => $this->findModel($id),
                'pilKeahlian'=>$pilKeahlian,
                'pilProyek'=>$pilProyek,
                'jenisKeahlian'=>$jenisKeahlian,
                //'feedback'=>$feedback,
                'pilPengalaman'=>$pilPengalaman,
                'pilPendidikan'=>$pilPendidikan,
                'pilSertifikasi'=>$pilSertifikasi,
                'pilPublikasi'=>$pilPublikasi,
                'pilPortofolio'=>$pilPortofolio,
                'directoryAsset'=>$directoryAsset,
                'searchPengalaman'=>$searchPengalaman,
                'dataPengalaman'=>$dataPengalaman,
                'searchPendidikan'=>$searchPendidikan,
                'dataPendidikan'=>$dataPendidikan,
                'searchSertifikasi'=>$searchSertifikasi,
                'dataSertifikasi'=>$dataSertifikasi,
                'searchPublikasi'=>$searchPublikasi,
                'dataPublikasi'=>$dataPublikasi,
                'searchProyek'=>$searchProyek,
                'dataProyek'=>$dataProyek,
                'pilBahasa'=>$pilBahasa,
            ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' =>  Pdf::MODE_UTF8,
            'defaultFont'=>'Arial',
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => [
            'title' => 'kreatifkita.id',
            'subject' => 'CV'
        ],
        'methods' => [
            
            'SetFooter' => ['|Page {PAGENO}|'],
        ]
    ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
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
