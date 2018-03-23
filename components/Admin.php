<?php
namespace app\components;

use Yii;

/**
 * Extended yii\web\User
 *
 * This allows us to do "Yii::$app->user->something" by adding getters
 * like "public function getSomething()"
 *
 * So we can use variables and functions directly in `Yii::$app->user`
 */
class Admin extends \yii\web\user
{
    public function getUsername()
    {
        return \Yii::$app->admin->identity->username;
    }

    public function getName()
    {
        return \Yii::$app->admin->identity->name;
    }
       public function getId()
    {
        return \Yii::$app->admin->identity->id;
    }
}