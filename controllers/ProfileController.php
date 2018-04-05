<?php

namespace app\controllers;

use yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ProfileController extends \yii\web\Controller
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
    public function actionIndex()
    {
        return $this->render('index');
    }

}
