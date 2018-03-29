<?php
#定义根目录
defined('DOCROOT') or define('DOCROOT', dirname(dirname(__dir__)));

#公共（各个web站点的）引导文件
require_once (DOCROOT . '/common/config/bootstrap.php');

#后台web的独有的引导文件
require_once (DOCROOT . '/backend/config/bootstrap.php');

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
*/



