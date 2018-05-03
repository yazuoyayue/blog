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
    public $basePath = '@webroot'; #所依赖的资源会，发布在这个路径/assets/目录下
    public $baseUrl = '@web';
    public $css = [
        'css/main.css'  #默认是在basePath下找
    ];
    public $js = [
        'js/main.js' #默认是在basePath下找
    ];
    public $depends = [
        'backend\assets\IeAsset',
        'backend\assets\CoreAsset',
        #'yii\web\YiiAsset',
        #'yii\bootstrap\BootstrapAsset'
    ];
}