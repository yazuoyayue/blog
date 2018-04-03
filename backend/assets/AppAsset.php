<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3
 * Time: 15:32
 */

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    #public $sourcePath = '@webroot';
    public $basePath = '@webroot'; #发布的路径
    public $baseUrl = '@web';
    public $css = [
        'css/main.css'
    ];
    public $js = [
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}