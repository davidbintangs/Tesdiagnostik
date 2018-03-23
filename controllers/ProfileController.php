<?php

namespace app\controllers;

use yii;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
