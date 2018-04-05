<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\AdminForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\Member;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
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
                        'actions'=>['signup','login','error','index'],
                        'allow'=>true,
                        //'roles'=>['?']
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	if (!Yii::$app->admin->isGuest) {
    		$this->layout="main";
            return $this->dashboard();
        }

        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        	$this->layout="main";
            return $this->dashboard();
        }
         $this->layout="main";
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function dashboard(){
    	return $this->render('dashboard');
    }
      

    public function actionLogout()
    {
        // Yii::$app->admin->logout();
        // $this->layout="main";
        // return $this->render('inde', [
        //     'model' => $model,
        // ]);
    }


}
