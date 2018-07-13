<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 10:01
 */

$params = require DOCROOT . '/backend/config/params.php';
#id, basePath, runtimePath是根据不同的应用需要‘变’的属性，所以放在应用层配置
return [
    'id' => 'backend',

    # @app 别名用到 在baseApplication 中有Yii::setAlias('@app', $this->getBasePath());
    'basePath' => DOCROOT . '/backend',

    #设置全局布局文件
    'layout' => 'sample',

    #设置默认controller
    'defaultRoute' => 'article/index',


    /*
     * 后台控制器的命名空间的定义,比如：路由解析到controller = site，那么site的命名空间就是这里定义的，继而找到类名，文件
     * 如果不定义呢，访问{host}/index.php 会发生如下
     * nable to find 'app\controllers\SiteController' in file: D:\git\blog\backend/controllers/SiteController.php. Namespace missing?
     */
    'controllerNamespace' => 'backend\controllers',

    #日志会用到，$this->logFile = Yii::$app->getRuntimePath() . '/logs/app.log';
    'runtimePath' => DOCROOT . '/backend/runtime',

    #组件
    'components' => [
        #后台用户组件
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => 'backend\models\Admin',
            'enableAutoLogin' => '',
            'loginUrl' => ['login/login']
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'xuepeng azuo 1314',
        ],
        /*
        数据库RBAC权限控制,不然在去yiii:$app->authManage的时候是null,导致null->getRoles(),语法报错
        */
        'authManager' => [
            'class' => 'common\core\rbac\DbManager',
        ],
    ],

    /**
     * 通过配置文件附加行为，全局
     */
    'as rbac' => [
        'class' => 'backend\behaviors\RbacBehavior',
        'allowActions' => [
            'login/login','login/logout','public*','debug/*','gii/*', // 不需要权限检测
        ]
    ],

    'params' => $params
];