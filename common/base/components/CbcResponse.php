<?php
namespace common\base\components;

use yii\web\Response;
class CbcResponse extends Response {
    public function send2()
    {
        var_dump('Ccbres');
        //parent::send();
    }
}