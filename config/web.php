<?php
use \yii\web\Request;
use kartik\mpdf\Pdf;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' =>[
        'gridview'=>[
        'class'=>'\kartik\grid\Module',
        ],
        'admin'=>[
                'class'=>'app\modules\admin\Module',
            ],
    ],
    'components' => [

        
        //komponen baru
        // setup Krajee Pdf component
        'formatter' => [
               'class' => 'yii\i18n\Formatter',
                'dateFormat' => 'dd/mm/yyyy',
                'decimalSeparator' => ',',
                'thousandSeparator' => ' ',
                'currencyCode' => 'IDR',
           ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LcT6ygUAAAAAPWANN-ZC2lMf5yc47vzbq93C9vk',
            'secret' => '6LcT6ygUAAAAAN6_D7bGHm_PGkPl3Ze9CnDVkO7A',
        ],
        
        'app\components\Bootstrap',
        'authClientCollection'=> [
            'class'=>'yii\authclient\Collection',
            'clients'=>[
                'facebook'=>[
                    'class'=>'yii\authclient\clients\Facebook',
                    'clientId'=>'255106901598357',
                    'clientSecret'=>'952cb50672e382041e7b9f97b455f363',
                ],
                'google'=>[
                    'class'=>'yii\authclient\clients\Google',
                    'clientId'=>'973331057394-i8q4lh5fj5p1dsjgm8575k252lj66oc6.apps.googleusercontent.com',
                    'clientSecret'=>'2o24-kAZIk-41oXssuPaMSzP',
                ],
            ],

        ],

        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl'=> true,
            'class' => 'yii\web\UrlManager',
            'showScriptName'=>false,
             'rules' => array(
                    'transaction/getrequestdetail/<id>' => 'transaction/getrequestdetail',),
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xxx',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\components\User',
            'identityClass' => 'app\models\Member',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        'view' => [
         'theme' => [
         'pathMap' => [
         '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example- views/yiisoft/yii2-app'
         ],
         ],
         ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
