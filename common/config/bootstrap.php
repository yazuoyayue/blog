<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 15:26
 */

#定义一些路径别名
#获取php.ini配置env
$env = get_cfg_var('env');

#如果存在env配置项并且有值，那么就用php.ini配置的值，否则默认是dev开发环境
$env = $env ? $env : 'dev';

#环境变量
defined('YII_ENV') or define('YII_ENV', $env);

#是否开启debug模式
defined('YII_DEBUG') or define('YII_DEBUG', $env != 'prod');


#加载vendor第三方依赖
require_once (DOCROOT . '/vendor/autoload.php');

#包含yii.php,yii的autoload模式
require_once (DOCROOT . '/vendor/yiisoft/yii2/Yii.php');

/**
 *设置别名
 * @see var_dump(Yii::$aliases);
*/
Yii::setAlias('@common', 'dd');