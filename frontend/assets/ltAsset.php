<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ltAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js'
    ];
    public $jsOptions = [
        'condition'=>'lte IE9',
        'position'=> \yii\web\View::POS_HEAD
    ];
}
