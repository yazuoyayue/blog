<?php
/**
 * @link www.52azuo.com
 * @copyright Copyright (c) 2018 www.52azuo.com Software Team
 * @author 高学朋<1641381910@qq.com>
 */

namespace common\services;

#加载腾讯短信服务
require_once (DOCROOT . '/common/qcloudsms_php/src/index.php');

use Qcloud\Sms\SmsSingleSender;
use Qcloud\Sms\SmsMultiSender;
use Qcloud\Sms\SmsVoiceVerifyCodeSender;
use Qcloud\Sms\SmsVoicePromptSender;
use Qcloud\Sms\SmsStatusPuller;
use Qcloud\Sms\SmsMobileStatusPuller;

use Qcloud\Sms\VoiceFileUploader;
use Qcloud\Sms\FileVoiceSender;
use Qcloud\Sms\TtsVoiceSender;

/**
 * @property

 */
class TencentSmsService extends TestSmsService {

    //发送短信
    public function send() {
        // 指定模板ID单发短信
        try {
            $ssender = new SmsSingleSender($this->appid, $this->appkey);
            $params = ["1993",10];
            $result = $ssender->sendWithParam("86", $this->phone, $this->templateId,
                $params, $this->smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
            $rsp = json_decode($result);
            echo $result;
        } catch(\Exception $e) {
            echo var_dump($e);
        }
        echo "\n";
    }
}