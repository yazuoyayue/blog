<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 10:01
 */

#id, basePath, runtimePath是根据不同的应用需要‘变’的属性，所以放在应用层配置
return [
    'id' => 'backend',
    'basePath' => DOCROOT . '/backend',
    'runtimePath' => DOCROOT . '/backend/runtime',
    'components' => []
];