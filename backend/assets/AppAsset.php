<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/template';
    public $baseUrl = '@web/template';
    public $css = [
        'https://use.fontawesome.com/releases/v5.11.2/css/all.css',
        'css/bootstrap.min.css',
        'css/mdb.min.css',
    ];
    public $js = [
        'js/jquery-3.4.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.js',
        'js/mdb.min.js',
        'js/modules/material-select.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
