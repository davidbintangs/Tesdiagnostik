<?php

namespace app\controllers;

use Yii;
use app\models\Proyek;
use app\models\ProyekSearch;
use app\models\Identitas;
use app\models\Member;
use app\models\KeahlianProyek;
use app\models\IdentitasMenawarProyek;
use app\models\IdentitasMenawarProyekSearch;
use app\models\IdentitasMengerjakanProyekSearch;
use app\models\IdentitasMengerjakanProyek;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * ProyekController implements the CRUD actions for Proyek model.
 */
class ProyekController extends Controller
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
                "dueDateBeforeSave" => [
                        
                        "class" => TimestampBehavior::className(),
                        "attributes" => [
                                ActiveRecord::EVENT_BEFORE_INSERT => "dueDate",
                                ActiveRecord::EVENT_BEFORE_UPDATE => "dueDate",
                        ],
                        "value" => function() { return Yii::$app->formatter->asDate($this->dueDate, "Y-MM-dd"); }
                        
                ],
                
                "dueDateAfterFind" => [
                        
                        "class" => TimestampBehavior::className(),
                        "attributes" => [
                                ActiveRecord::EVENT_AFTER_FIND => "dueDate",
                        ],
                        "value" => function() { return Yii::$app->formatter->asDate($this->dueDate, "MM/dd/Y"); }
                        
                ]
        ];
    }

    /**
     * Lists all Proyek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProyekSearch();
        $pembuat=null;
        $query =Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query, $pembuat);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

        public function actionProyekKeahlian()
    {
        $searchModel = new ProyekSearch();
        $pembuat=null;
        $query =Yii::$app->request->queryParams;
        $dataProvider = $searchModel->keahlian($query);

        return $this->render('proyekKeahlian', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * menampilkan proyek yang dimiliki aku yang login.
     * @param integer $id
     * @return mixed
     */

      public function actionProyekSaya()
    {
        $identitas= new Identitas();
        $pembuat= $identitas->getId();
        $searchModel = new ProyekSearch();
        $query =Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query, $pembuat);

        return $this->render('proyekSaya', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function dataProyekSaya($id){
        $proyek = new Proyek();
        $dataProvider = $proyek->findOne($id);
        return $dataProvider;
    }
    public function actionPekerjaanSaya()
    {
        $identitas= new Identitas();
        $pembuat= $identitas->getId();
        $searchModel = new ProyekSearch();
        $dataProvider = $searchModel->pekerjaan($pembuat);

        return $this->render('pekerjaanSaya', [
            'dataProvider' => $dataProvider,


        ]);
    }
    public function dataPekerjaanSaya($id){
        $proyek = new Proyek();
        $dataProvider = $proyek->findOne($id);
        return $dataProvider;
    }




    /**
     * Displays a single Proyek model.
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
     * Creates a new Proyek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

     public function actionTawar($id)
    {
        return $this->render('tawar', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDetailproyek($id)
    {
        return $this->render('detailProyek', [
            'model' => $this->findModel($id),
        ]);
    }


       public function actionPekerja($id,$identitas)
    {
         return $this->renderAjax('pekerja', [
            'id' => $id,
            'identitas'=>$identitas,

            
        ]);
    }

        public function findPekerja($id){
            //$identitas = new Identitas;
         if (($identitas = Identitas::findOne($id)) !== null) {
            return $identitas;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        }

        //untuk menampilkan data orang yang membuat sebuah proyek dari tabel identitas dengan parameter $identiti = identitas pada tabel proyek
        public function pembuatProyek($identiti){
            $identitas = new Identitas();
            
            // $model = new Proyek();
            // $id=$model->identitas;
            // $idproyek=$model->id;

           
            $menawarProyek = new IdentitasMenawarProyek;

            $pembuatProyek = $identitas->findOne($identiti);
            
            return $pembuatProyek;
        }

        //untuk menampilkan data orang yang membuat sebuah proyek dari tabel member dengan parameter $identiti = identitas pada tabel proyek
        public function member($identiti){
            
            $pembuatProyek= $this->pembuatProyek($identiti);
            
            $idmember= $pembuatProyek['member'];
            $member = new Member();
            $member = $member->findOne($idmember); 

            return $member;
        }

         //untuk menampilkan data orang yang mengerjakan proyek dari tabel member dengan parameter $identiti = identitas pada tabel proyek
        public function freelancer($identiti){
           $member = new Member();
           $member = $member->getMember($identiti);


           return $member;
        }

        //untuk menampilkan seluruh data orang yang menawar pada sebuah proyek dengan parameter $kondisi = id (proyek) 
        public function dataPenawar($kondisi){
            $model = new Proyek();
            $searchModel = new IdentitasMenawarProyekSearch();
            $query= Yii::$app->request->queryParams;
            $dataPenawar = $searchModel->search($query,$kondisi);

            return $dataPenawar;

        }

    /*
     * kamu yang semangat yaaa.. 
     * hehehehehe
     * 
     *
     * Creates a new Proyek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
       
        $identitas= new Identitas();
        $identiti=$identitas->getId();
        $model = new Proyek();
        $model->created_at =date('Y-m-d');
        $model->identitas=$identiti;
        $model->status='published';
        $model->save();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['keahlian-proyek/create','id'=>$model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'identiti'=>$identiti,

            ]);
        }
    }



    // $gambar = UploadedFile::getInstance($model, 'gambar');
            // if($model->validate()){
            //     $model->save();
            //     if (!empty($gambar)) {
            //         $gambar->saveAs(Yii::getAlias('@app/web/avatar/') .$username.'.' . $gambar->extension);
            //         $model->gambar = $username.'.' . $gambar->extension;
            //         $model->save(FALSE);
            //     }
            // }
            // $model->save();

    /**
     * Updates an existing Proyek model.
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
     * Deletes an existing Proyek model.
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
     * Finds the Proyek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Proyek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Proyek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function getMember($id){

        $member = $this->findMember($id);
        return $member;
    }
     protected function findMember($id)
    {
        if (($member = Member::findOne($id)) !== null) {
            return $member;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } 



    public function actionProyekdikerjakan($id)
    {

        $profil = new Identitas();
        $mengerjakanProyek = new IdentitasMengerjakanProyek();
        $profil = $profil->getId();

        //$tawaran = findOne dari tabel identntitas_menawar_proyek
        $tawaran = $this->findTawaran($id);
        $dana=$tawaran->dana;
        $waktu=$tawaran->waktu;

        //$identitasPenawar = id identitas dari tawaran (orang yang melakukan tawaran)
        $identitasPenawar = $tawaran->identitas;

        //$dataPenawar = data orang yang menawar proyek
        $dataPenawar = $this->pembuatProyek($identitasPenawar);

        //$proyek = id proyek dari tawaran yang akan di acc
        $proyek = $tawaran->proyek;

        //$member = data identitas dari tabel member diambil dari proyek
        $member = $this->freelancer($identitasPenawar);

        //$proyek = data dari proyek yang akan dikerjakan
        $dataProyek = $this->findModel($proyek); 
        

        // $pembuatProyek = id orang yang membuat proyek
        $pembuatProyek= $dataProyek->identitas;
        
        //$dataPembuatProyek = data orang yang membuat proyek
        $dataPembuatProyek = $this->pembuatProyek($pembuatProyek);


        /*
            jika orang yang mengakses halaman acc proyek adalah orang yang membuat proyek dan yang sedang login maka akan diteruskan ke halaman proyek dikerjakan jika tidak maka halaman tidak ditemukan
        */
            $dataDikerjakan =$this->findProyekDikerjakan($proyek);
        
            if (empty($dataDikerjakan)) {
            $mengerjakanProyek->identitas =$identitasPenawar;
            $mengerjakanProyek->proyek =$proyek;
            $mengerjakanProyek->status ='tawaran diterima';
            $mengerjakanProyek->dana=$dana;
            $mengerjakanProyek->waktu=$waktu;
            $mengerjakanProyek->save(false);
            }

       // if ($profil==$pembuatProyek) {
            if ($dataProyek->status=='ditawar') {
                $dataProyek->status ='tawaran diterima';
                $dataProyek->tawaran=$id;
                $dataProyek->save(false);

            }
            
            return $this->render('proyekdikerjakan', [
            'dataPenawar'=>$dataPenawar,
            'dataPembuatProyek'=>$dataPembuatProyek,
            'member'=>$member,
            'dataProyek'=>$dataProyek,
            'mengerjakanProyek'=>$mengerjakanProyek,
            'dataDikerjakan'=>$dataDikerjakan,
            'id'=>$id,
            ]);

        /*}else{
            return $this->render('eror', [
            'identitas'=>$identitas,   
            ]);
        }*/

    }

    public function actionMengerjakanProyek($id)
    {
            $dataProyek = $this->findModel($id);

            $idowner = $dataProyek->identitas;
            $dataOwner = $this->pembuatProyek($idowner);

            $member = $this->freelancer($idowner);

            $modelProyek = new Proyek();
            $dataProyekDikerjakan = $modelProyek->getProyekDikerjakan($id); 

        return $this->render('mengerjakanProyek', [
            'dataProyek'=>$dataProyek,
            'dataProyekDikerjakan'=>$dataProyekDikerjakan,
            'dataOwner'=>$dataOwner,
            'member'=>$member,
            'id'=>$id,
            ]);       

    }

     protected function findTawaran($id)
    {
        if (($penawar = IdentitasMenawarProyek::findOne($id)) !== null) {
            return $penawar;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    } 
      protected function findProyekDikerjakan($proyek)
    {
       $identitasMengerjakanProyek= new IdentitasMengerjakanProyek();
        $getId= $identitasMengerjakanProyek->getDataByProyek($proyek);

        return $getId;
    }

    public function actionProyekselesai($id)
    { 
        $model = $this->findModel($id);
        $identitas= new Identitas();
        $proyek = new Proyek();
        
        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);

            $sql = "SELECT COUNT(*) FROM proyek WHERE identitas =".$model['identitas'];
            $sql2 = "SELECT * FROM proyek WHERE identitas =".$model['identitas'];
            $jumlah_proyek = Yii::$app->db->createCommand($sql)->queryScalar();
            $total_proyek = Yii::$app->db->createCommand($sql2)->queryAll();

            $total_rating=0;    
            foreach ($total_proyek as $rating) {
                $total_rating=$total_rating+$rating['rating_proyek'];
            }
            //mencari total rating
            $total_rating=$total_rating/$jumlah_proyek;
            //menyimpan pada tabel identitas
             $dataPembuatProyek = $this->pembuatProyek($model['identitas']);
             $dataPembuatProyek->rating_proyek=$total_rating;
             $dataPembuatProyek->save(false);            
           
            return $this->redirect(['/proyek/mengerjakan-proyek','id'=>$id]);
        } else {
            return $this->renderAjax('proyekselesai', [
                'model' => $model,
                'id'=>$id,
            ]);
        }
    }




}
