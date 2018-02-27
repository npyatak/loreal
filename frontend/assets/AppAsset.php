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
        'css/app-011c842261.css',
        'css/add.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i',
    ];
    public $js = [
        'js/jquery.colorbox.js',
        'js/jquery.mousewheel.js',
        'js/jquery.jscrollpane.min.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
