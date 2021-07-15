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
        'css/bootstrap.min.css',
        'css/bootstrap-rtl.min.css',
        'css/font-awesome.min.css',
        'css/carousel.css',
        'css/owl.carousel.css',
        'css/style.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/owl.carousel.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
