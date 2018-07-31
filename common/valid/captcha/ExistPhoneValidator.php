<?php
namespace common\valid\captcha;

use yii\validators\Validator;
use yii;

class ExistPhoneValidator extends Validator{
    public $table_model = '';
    protected function validateValue($value) {
        new $this->table_model();
        $this->table_model::isExist();
        var_dump($value);exit;
    }
}