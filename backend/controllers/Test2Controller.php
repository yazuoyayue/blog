<?php
namespace backend\controllers;

use common\base\CbController;
use Yii;
class Test2Controller extends CbController {

    public function actionIndex() {
//        $res = Yii::$app->response;
//        $res->data = '222';
//        $res->send();

        $array = [0, 1, 2];
        $ref =& $array; // Necessary to trigger the old behavior
        foreach ($array as $val) {
            var_dump($val);
            unset($array[1]);
        }

        exit;

        $array = [0, 1, 2];
        $ref =& $array; // Necessary to trigger the old behavior
        foreach ($array as $val) {
            var_dump($val);
            unset($array[1]);
        }



        $arr = [1,2,3];
        foreach ($arr as $key => $val) {
            if($key == 1) {
                unset($arr[$key]);
            }

        }
        var_dump($arr);
        exit;
        $str = 'abcde %$#试试';
        $t = mb_strlen($str,'8bit');
        var_dump($t);exit;

        $t = ['a' => 1, 'b' => 2];
        $obj_t = (object) $t;
        var_dump($obj_t);exit;
        return 'asd';
    }

}