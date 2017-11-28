<?php
namespace app\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\MemberSosialMedia;
use app\models\Member;
use app\models\Identitas;
use app\models\Proyek;
use app\models\ProyekSearch;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout','signup'],
                'rules' => [
                    [
                        'actions'=>['login','signup','error',],
                        'allow'=>true,
                        //'roles'=>['?']
                    ],
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth'=>[
                'class'=>'yii\authclient\AuthAction',
                'successCallback'=>[$this,'successCallback'],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
     {
        if (!\Yii::$app->user->isGuest)
        {
                $proyek = new Proyek();

                //$this->layout ="main";
                $model= new Identitas();
                $id=$model->getId();
                $searchProyek = new ProyekSearch();
                $params =Yii::$app->request->queryParams;
                $kondisi= null;
                $dataProyek = $searchProyek->search($params, $kondisi);

                if (!empty($id)){
                    $this->layout="main";
                    return $this->render('index',[
                        'proyek'=> '$proyek',
                        'searchProyek'=>$searchProyek,
                        'dataProyek'=>$dataProyek,
                        ]);      
                }
                else{
                    /*$this->actionCreate();
                    return $this->render('identitas', [
                        'model' => $model,
                    ]);*/

                    //$this->action->successUrl = Url::to(['signup']);
                    return $this->redirect('./profil');
                }
                }
        else
        {
            $this->layout="main";
            return $this->render('login');
            
        }
        
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
     /**
     * Succes Callback
     *
     * @return string
     */
    public function successCallback($client)
    {
        //memanggil method untuk menyimpan data dari sosial media
        $attributes=$this->safeAttributes($client); 

        //untuk mengecek apakah data sosial media sudah ada didalam database

        $member_sosial_media =MemberSosialMedia::find()
            ->where([
                    'sosial_media'=>$attributes['sosial_media'],
                    'id'=>(string)$attributes['id'],
                    'username'=>$attributes['username'],
                ])  
                ->one();

            //jika data ditemukan
            if($member_sosial_media){
                //jika pengguna sudah aktif maka
                $member=$member_sosial_media->member;

                if($member->status==member::STATUS_ACTIVE){
                    //melakukan login otomatis
                    Yii::$app->user->login($member);
                }
                else{
                    Yii::$app->session->setFlash('error','Login gagal, status user tidak aktif');
                    //selesai
                }
            }

            else{
                //jika data tidak ditemukan 
                //dilakukan pengecekan data email di tabel member
                $member= Member::find()
                ->where([
                    'email'=>$attributes['email']
                    ])
                ->one();
                //jika data ditemukan 
                if($member){
                    //mengecek apakan member aktif
                    if($member->status==Member::STATUS_ACTIVE){
                        //menambahkan data ke tabel member sosial media
                        $member_sosial_media=new MemberSosialMedia ([
                                'sosial_media'=>$attributes['sosial_media'],
                                'id'=>(string)$attributes['id'],
                                'username'=>$attributes['username'],
                                'member_id'=>$member->id,
                            ]);
                        $member_sosial_media->save();

                        //melakukan otomatis login
                        Yii::$app->user->login($member);
                    }
                    else{
                        Yii::$app->session->setFlash('Error','Login Gagal Status User tidak aktif');
                    }
                }
                else{
                    // //cek apakah sosial media yang digunakan untuk login bukan twitter

                    // if($attributes['sosial_media']!='twitter'){
                    //     //laukan login otomatis
                    //     $password= Yii::$app->security->generateRandomString(6);
                    //     $member= new Member([
                    //         'username'=>$attributes['username'],
                    //         'email'=>$attributes['email'],
                    //         'password'=>$password,
                    //         ])
                    //     $member->generateAuthKey();
                    //     $member->generatePasswordResetToken();
                    //     if($member->save()){
                    //         $member_sosial_media= new MemberSosialMedia([
                    //                 'sosial_media'=>$attributes['sosial_media'],
                    //                 'id'=>(string)$attributes['id'],
                    //                 'username'=>$attributes['username'],
                    //                 'member_id'=>$member->id,
                    //             ]);
                    //         $member_sosial_media->save();
                    //         //melakukan login otomatis
                    //         Yii::$app\user\login($member);
                    //     }
                    //     else{
                    //         Yii::$app->session->setFlash('error','Login gagal, terdapat kesalahan saat registrasi');
                    //     }
                    // }
                    // else{
                    //     //save data attribute to session
                    //     $session=Yii::$app->session;
                    //     $session['attributes']=$attributes;

                    //     //redirect ke signup
                    //     $this->action->successUrl = Url::to(['signup']);
                    // }
                }

            }
    }

    public function safeAttributes($client)
    {
        //untuk mendapatkan data dari social media(client)
        $attributes=$client->getUserAttributes();
        //mengatur default value
        $save_attributes=[
            'sosial_media'=>'',
            'id'=>'',
            'username'=>'',
            'name'=>'',
            'email'=>'',
        ];
        //kode untuk mendapatkan grap data dari sosmed
        if($client instanceof \yii\authclient\clients\Facebook){
            $save_attributes=[
                'sosial_media'=>'facebook',
                'id'=>$attributes['id'],
                'username'=>$attributes['name'],
                'name'=>$attributes['name'],
                'email'=>$attributes['email'],
            ];
        }
        else if ($client instanceof \yii\authclient\clients\Google){
            $save_attributes=[
                'sosial_media'=>'google',
                'id'=>$attributes['id'],
                'username'=>$attributes['emails']['0']['value'],
                'name'=>$attributes['displayName'],
                'email'=>$attributes['emails']['0']['value'],
            ];
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
         public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
        /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('sukses', 'passsword telah dirubah');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

        public function actionKomentar(){
        $model = new \app\models\Komentar();

        //jika form di submit dengan action post

        if(Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            if ($model->validate()){
                Yii::$app->session->setFlash('success','Terima Kasih ');
            }
            else{
                Yii:$app->session->setFlash('error','Maaf, Ada yang salah');
            }
            return $this->render('hasil_komentar',['model'=>$model,]);
        }
        else{
            return $this->render('komentar',['model'=>$model]);
        }

    }


}
