<?php
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
class SmsService {

    public function __construct()
    {

    }

    public function send() {
        // 短信应用SDK AppID,缓存key
        $appid = 1400116141; // 1400开头

        // 短信应用SDK AppKey,缓存key对应的value
        $appkey = "a29fb00665f8497f6eadb3221a6a884b";

        // 需要发送短信的手机号码
        $phoneNumbers = ["18552272190", "13270863631"];

        // 短信模板ID，需要在短信应用中申请
        $templateId = 160741;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请

        // 签名
        $smsSign = "阿佐的分享"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`

        // 指定模板ID单发短信
        try {
            $ssender = new SmsSingleSender($appid, $appkey);
            $params = ["1993",10];
            $result = $ssender->sendWithParam("86", $phoneNumbers[1], $templateId,
                $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
            $rsp = json_decode($result);
            echo $result;
        } catch(\Exception $e) {
            echo var_dump($e);
        }
        echo "\n";
    }

}