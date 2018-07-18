<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/2
 * Time: 10:01
 */

#vendor路径和时区设置一般是不变的,所以放在公共配置
return [
    'vendorPath' => DOCROOT . '/vendor', #@bower用到
    'timeZone' => 'Asia/Shanghai', #设置时区
    'bootstrap' => [
        //'log',
        'debug'
    ],  # 开启日志,这个一定要加
    'modules' => [
        'debug' => [   #debug
            'class' => \yii\debug\Module::class,
            'allowedIPs' => ['*', '::1'],
            'historySize' => 200,
        ],
        #gii自动生成代码工具
        'gii' => [
            'class' => 'yii\gii\Module',
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module',
        ],
    ],
    'components' => [
        'log' => [
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                ]
            ]
        ],
        'db' => [
            'class' => 'yii\db\Connection'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ]
    ]
];
