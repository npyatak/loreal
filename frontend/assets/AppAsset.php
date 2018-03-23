<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
<<<<<<< HEAD
        'css/app.css?v=13032018_2',
        'css/add.css?v=13032018_2',
        //'css/new.css?v=13032018_2',
=======
        'css/app.css?v=23032018_1',
        'css/add.css?v=23032018_1',
        'css/new2.css?v=23032018_1',
        //'css/new.css?v=23032018_2',
>>>>>>> 5e7bad3e3401f301814cef945fe7aef7ab420b13
        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
    ];
    public $js = [
        'js/jquery.colorbox.js',
        'js/jquery.mousewheel.js',
        'js/jquery.jscrollpane.min.js',
        'js/app.js?v=23032018_1',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
