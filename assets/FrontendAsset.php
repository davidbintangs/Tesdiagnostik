<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.css',
         'css/bootstrap.min.css',
        'css/chocolat.css',
        'css/style.css',
        'css/AdminLTE.min.css',
        
    ];
    public $js = [ 
        'js/modal.js',
        'frontend/js/bootstrap.js',
        'frontend/js/easing.js',
        'frontend/js/jquery-1.11.1.min.js',
        'frontend/js/jquery.chocolat.js',
        'frontend/js/jquery.hoverdir.js',
        'frontend/js/modernizr.custom.97074.js',
        'frontend/js/move-top.js',
        'frontend/js/responsiveslides.min.js',
        'frontend/js/wow.min.js',
        


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
