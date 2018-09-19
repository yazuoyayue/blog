<?php
namespace common\valid\captcha;

use yii\validators\Validator;
use yii;

class ExistPhoneValidator extends Validator{
    public $table_model = '';
    protected function validateValue($value) {
        //var_dump($this->table_model);
        //$tb_model = new $this->table_model();
        $tb = $this->table_model;
        $tb_model = $tb::findOne(['mobile' => 13260961809]);
//        $this->table_model::isExist();
        //var_dump($tb_model);
        if(!empty($tb_model)) {
            return [$this->message, []];
        }

    }
}