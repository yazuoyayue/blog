<?php
/**
 * @link www.52azuo.com
 * @copyright Copyright (c) 2018 www.52azuo.com Software Team
 * @author 高学朋<1641381910@qq.com>
 */
namespace  common\services;
use common\helpers\ArrayHelper;
use common\helpers\Util;
use common\models\Sms;
use yii\base\Component;

/**
 * 短信抽象服务类
 *
 * @property \common\valid\SmsValid $valid 短信手机验证
 */
abstract class TestSmsService extends Component{

    /**
     * 发送前，发送后的数据验证
     *
     * @var object  短信验证类实例
     */
    public $valid = '';

    /**
     * 接口url
     *
     * @var string 接口url
     */
    public $url = '';

    /**
     * 接收短信的手机号
     *
     * @var string 手机号
     */
    public $phone = '';

    /**
     * 短信模板id
     *
     * @var string 模板id
     */
    public $templateId = '';

    /**
     * 第三方应用id
     * @var string 应用id
     */
    public $appid = '';

    /**
     * 第三方应用秘钥
     * @var string 秘钥
     */
    public $appkey = '';

    /**
     * 签名
     *
     * @var string 签名
     */
    public $smsSign = '';

    /**
     * 接收短信的手机号
     *
     * @var \common\models\Sms 接收的数据模型
     */
    public $model = null;

    /**
     * 初始化
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->preInit($config);
    }

    // 发送短信
    abstract public function send();

    // 验证器验证数据
    protected function valid(){
        return Util::verifyPhone($this->phone);
    }

    /**
     * 设置数据模型
     *
     * @param \common\models\Sms $model 数据模型
     */
    public function setModel(Sms $model) {
        $this->model = $model;
    }

    /**
     * 加载数据
     *
     * @param array $data
     */
    public function load($data) {
        if($this->model === null) {
            $this->setModel(new Sms());
        }
        //$data = ArrayHelper::getValue($data, get_class($this->model), []);
        if(!($this->model->load($data) && $this->model->validate())) {
            print_r($this->model->errors);exit;
        }

        return $this;
    }

    /**
     * 初始化配置config
     *
     * @param array $config
     */
    protected function preInit(& $config) {
        $this->url = $config['url'];
        $this->appid =  $config['appid'];;
        $this->appkey = $config['appkey'];
    }
}