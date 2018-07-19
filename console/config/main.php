<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 10:01
 */

#id, basePath, runtimePath是根据不同的应用需要‘变’的属性，所以放在应用层配置
return [
    'id' => 'console',

    # @app 别名用到 在baseApplication 中有Yii::setAlias('@app', $this->getBasePath());
    'basePath' => DOCROOT . '/console',

    /*
     * 后台控制器的命名空间的定义,比如：路由解析到controller = site，那么site的命名空间就是这里定义的，继而找到类名，文件
     * 如果不定义呢，访问{host}/index.php 会发生如下
     * nable to find 'app\controllers\SiteController' in file: D:\git\blog\backend/controllers/SiteController.php. Namespace missing?
     */
    'controllerNamespace' => 'console\controllers',

    'controllerMap' => [
         'migrate' => [
              'class' => 'yii\console\controllers\MigrateController',
//              'migrationNamespaces' => [
//                  'app\migrations',
//                  'app\yii2admin\migrations',
//              ],
              'migrationPath' => ['@app/migrations','@app/yii2admin/migrations'], // allows to disable not namespaced migration completely
          ],
    ],

    #日志会用到，$this->logFile = Yii::$app->getRuntimePath() . '/logs/app.log';
    'runtimePath' => DOCROOT . '/console/runtime',

    #组件
    'components' => []
];


/*
迁移

yii\console\Application 初始化一些系统命令，如迁移migrate/help..


foreach ($this->coreCommands() as $id => $command) {
    if (!isset($this->controllerMap[$id])) {
        $this->controllerMap[$id] = $command;  ---------------controller映射
    }
}
return [
    'asset' => 'yii\console\controllers\AssetController',
    'cache' => 'yii\console\controllers\CacheController',
    'fixture' => 'yii\console\controllers\FixtureController',
    'help' => 'yii\console\controllers\HelpController',
    'message' => 'yii\console\controllers\MessageController',
    'migrate' => 'yii\console\controllers\MigrateController', ----------迁移
    'serve' => 'yii\console\controllers\ServeController',
];





*/