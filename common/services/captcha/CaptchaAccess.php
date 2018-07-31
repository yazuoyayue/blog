<?php
namespace common\services\captcha;

use common\services\CaptchaService;
use yii\base\Component;

/**
 * 验证码发送前的限制
 */
class CaptchaAccess extends Component {
    /**
     * 规则制定
     */
    public $rules = ['ExistPhone'];

    /**
     * sms数据体
     */
    public $sms_model = null;

    public function valid(CaptchaService $captcha_serv) {
        $this->sms_model = $captcha_serv->model;
        if(!empty($this->rules)) {
            foreach($this->rules as $rule) {
                $rule = $rule . 'Validator';
                $rule = "\\common\\valid\\captcha\\$rule";
                $rule = new $rule();
                //$rule->validValue($this->sms_model);
                var_dump($rule);exit;
            }
        }
        var_dump($captcha_serv->model);exit;
    }

    public function rules() {
        return [['phone'],'ExistPhone'];;
    }

}