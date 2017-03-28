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
        'js/assets/owl.carousel.css',
        'js/assets/owl.theme.default.css',
        'css/font-awesome.css',
        'css/style.css',
        'css/media.css',
    ];
    public $js = [
        'js/fancybox/jquery.fancybox.js',
        'js/owl.carousel.js',
        'js/myjs.js',
        'js/jquery.isotope.min.js',
        'js/sorting.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
