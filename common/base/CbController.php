<?php

namespace common\base;
use Yii;
use yii\web\Controller;
class CbController extends Controller {

    public $enableCsrfValidation = false;
    public function __construct($id, $module, $config = [])
    {var_dump($id, $module,$config);exit;
        parent::__construct($id, $module, $config);
        #自定义response组件
        Yii::$app->set('response','common\base\components\CbcResponse');
    }
}