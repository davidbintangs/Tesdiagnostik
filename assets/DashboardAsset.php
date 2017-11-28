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
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            'css/bootstrap.min.css',
            'css/site.css',
            'css/AdminLTE.min.css',
            'css/skins/_all-skins.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css',
            'plugins/iCheck/flat/blue.css',  
            // 'css/animate.css',
            // 'css/chocolat.css',
            //'css/style.css',
            // 'plugins/site.css',
           //  'frontend/font/fontawesome-webfont.ttf',
           //  'frontend/font/FontAwesome.otf',
           //  'frontend/font/fontawesome-webfont.svg',
           //  'frontend/font/fontawesome-webfont.woff',
           //  'frontend/font/glyphicons-halflings-regular.woff',
           // 'frontend/font/glyphicons-halflings-regular.woff2',



            
    ];
    public $js = [ 
        'js/modal.js',
        //'js/demo.js',
        //'js/jquery-2.2.3.min',
        '//code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        '//cdnjs.jquery.com/ajax/libs/raphael/2.1.0/raphael.min.js',
        'js/bootstrap.min.js',
        'js/app.min.js',
        'plugins/sparkline/jquery.sparkline.min.js',
        'plugins/slimScroll/jquery.slimscroll.min.js',
        'plugins/fastclick/fastclick.min.js',
        'js/dashboard.js',


        // 'js/pages/dashboard.js',
        // '//code.jquery.com/ui/1.11.4/jquery-ui.min.js',
        // '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
        // 'plugins/morris/morris.min.js',
        // 'plugins/sparkline/jquery.sparkline.min.js',
        // 'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        // 'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        // 'plugins/knob/jquery.knob.js',
        // 'plugins/daterangepicker/daterangepicker.js',       
        // 'frontend/js/bootstrap.js',
        // 'frontend/js/easing.js',
        // 'frontend/js/jquery-1.11.1.min.js',
        // 'frontend/js/jquery.chocolat.js',
        // 'frontend/js/jquery.hoverdir.js',
        // 'frontend/js/modernizr.custom.97074.js',
        // 'frontend/js/move-top.js',
        // 'frontend/js/responsiveslides.min.js',
        // 'frontend/js/wow.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
