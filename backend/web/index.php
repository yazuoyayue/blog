<?php

//$arr = array("Hello" => "Hi", "world" => "earth");
//$arr = strtr("aidenliu","ai","b");
////echo strtr("Hello world",$arr);
//echo $arr;
//
//exit;

#定义根目录
defined('DOCROOT') or define('DOCROOT', dirname(dirname(__dir__)));

#公共（各个web站点的）引导文件
require_once (DOCROOT . '/common/config/bootstrap.php');

#后台web的独有的引导文件
require_once (DOCROOT . '/backend/config/bootstrap.php');

#公共配置 > 某个环境配置 > 某个应用程序配置 , 本地local配置 > 模板配置
$configs = \yii\helpers\ArrayHelper::merge(
    require (DOCROOT . '/common/config/main.php'),
    require (DOCROOT . '/common/config/main-local.php'),
    require (DOCROOT . '/enviornments/' . $env . '/config/main.php'),
    require (DOCROOT . '/enviornments/' . $env . '/config/main-local.php'),
    require (DOCROOT . '/backend/config/main.php'),
    require (DOCROOT . '/backend/config/main-local.php')
);

#发布Yii\bootstarp\BootstarpAsset资源的时候用到@bower,默认的@bower是 'vendor\bower路径'
#所以，这里对它进行重写

$app = new \yii\web\Application($configs);

Yii::setAlias('@bower', DOCROOT . '/vendor/bower-asset');
#var_dump($app->db->createCommand('select * from tb_user')->queryAll());
$app->run();


#Yii::$app->log->logger->log('22',0x08);
#Yii::info('222333');exit;

/*
$a = [
    'a' => [
        'a2' => ['s1' => '22']
    ],
    'a3' => [
        'a2' => ['s1' => '22']
    ]
];

#var_dump(\yii\helpers\ArrayHelper::getValue($a,'a.a24'));exit;  输出：null
#var_dump(\yii\helpers\ArrayHelper::getValue($a,'a.a24', ''));exit; 输出 ''
var_dump(\yii\helpers\ArrayHelper::getValue($a,['a', 'a2', 's1'], ''));exit; 输出 '22'
var_dump(\yii\helpers\ArrayHelper::getValue($a,'a.a2.s1', ''));exit; 输出 '22'

*/


/*
var_dump(['aa'] + ['bb','d']);exit;

output :
array (size=2)
  0 => string 'aa' (length=2)
  1 => string 'd' (length=1)

键是数字的时候，array_merge 会追加，+不会
键是字符的时候， array_merge会覆盖前面的，+不会
*/

/*
array_merge 和 ArrayHelper::merge的不同之处
==============example 1============
$arr1 = [
    'key1' => 12,
    'key2' =>[
        'key3_1' => 56
    ]
];

$arr2 = [
    'key1' => 'arr2_key1',
    'key2' =>[
        'key2_1' => 5666
    ]
];
var_dump(yii\helpers\ArrayHelper::merge($arr1, $arr2));
#var_dump(array_merge($arr1, $arr2));

ArrayHelper::merge, 输出:
array (size=2)
  'key1' => string 'arr2_key1' (length=9)
  'key2' =>
    array (size=2)
      'key3_1' => int 56
      'key2_1' => int 5666


php自有的array_merge 输出:
array (size=2)
  'key1' => string 'arr2_key1' (length=9)
  'key2' =>
    array (size=1)
      'key2_1' => int 5666


//我们用一个数组来存储上一条记录的右值，再把它和本条记录的右值比较，如果前者比后者小，说明不是父子关系，就用array_pop弹出数组，否则就保留
//两个循环而已，没有递归
$lists = [
        ['left' => 1,'rgt' => 6, 'title' => '0分类'],
        ['left' => 2,'rgt' => 5, 'title' => '1分类'],
        ['left' => 3,'rgt' => 4, 'title' => '2分类'],
        ['left' => 7,'rgt' => 8, 'title' => '0分类'],
    	['left' => 9,'rgt' => 12, 'title' => '0分类'],
        ['left' => 10,'rgt' => 11, 'title' => '1分类']
    ];
    $parent = array();
    $arr_list = array();
    foreach($lists as $item){
        #if(count($parent)){
            while (count($parent) > 0 && $parent[count($parent) -1]['rgt'] < $item['rgt']){
                array_pop($parent);
            }
        #}
        $item['depath'] = count($parent);
        $parent[] = $item;
        $arr_list[]= $item;
    }
    //显示树状结构
    foreach($arr_list as $a)
    {
        echo str_repeat('--', $a['depath']) . $a['title'] . '<br />';
    }
exit;
*/



