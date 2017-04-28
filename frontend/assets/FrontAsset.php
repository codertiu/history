<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class FrontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic',
        'css/bootstrap.css',
        'style.css',
        'css/dark.css',
        'css/font-icons.css',
        'css/animate.css',
        'css/magnific-popup.css',
        'umid.css',
        'css/responsive.css'
    ];
    public $js = [
        'js/jquery.js',
        'js/plugins.js'
    ];
    public $jsOptions = [
        'position'=> \yii\web\View::POS_HEAD
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset'
    ];
}
