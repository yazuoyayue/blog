<?php
namespace common\models;

use common\services\CaptchaService;
use yii\base\Model;

/**
 * @property int|string $phone
 */
class Sms extends Model {
    /**
     * @var string 手机号
     */
    public $phone = '';

    /**
     * @var string 手机号
     */
    public $templateId = 160741;



    public function rules()
    {
        return [
            [['phone'] ,"\\common\\valid\\captcha\\ExistPhoneValidator", 'table_model' => '\\backend\\models\\User', 'message' => CaptchaService::EXIST_CODE]
        ];
    }


}