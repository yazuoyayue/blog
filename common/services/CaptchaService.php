<?php
/**
 * @link www.52azuo.com
 * @copyright Copyright (c) 2018 www.52azuo.com Software Team
 * @author 高学朋<1641381910@qq.com>
 */
namespace common\services;

use common\models\Sms;
use yii;

class CaptchaService extends \yii\base\Component {
    /**
     * @var string 接收验证码的手机
     */
    #public $phone = '';

    /**
     * @var int 验证码类型
     */
    #public $type = '';

    /**
     * @var array 发送的条件
     */
    #public $access = [];

    /**
     * 接收、存储数据的模型
     *
     * @var \common\models\Sms 接收的数据模型
     */
    public $model = null;

    /**
     * 接收、存储数据的模型
     *
     * @var \common\models\Sms 接收的数据模型
     */
    public $data = null;

    public $errors = null;

    const EXIST_CODE = 100001;

    public static $errText = [
        self::EXIST_CODE => '手机号已经存在'
    ];

    public function __construct($config = [])
    {
        parent::__construct($config);
        $this->preinit();
    }

    // 发送验证码
    public function send() {
        //$this->load($data);
        if($this->errors) {
            foreach($this->errors as $err) {
                throw new \Exception(self::$errText[$err[0]], $err[0]);
            }

        }
        var_dump('send');
       // $this->valid();
        return true;
    }

    /**
     * 设置数据模型
     *
     * @param \common\models\Sms $model 基类Sms数据模型
     */
    public function setModel(Sms $model) {
        $this->model = $model;
    }

    /**
     * 获取数据模型
     */
    public function getModel() {
        if($this->model === null) {
            $this->setModel(new Sms());
        }
        return $this->model;
    }

    /**
     * 加载数据
     *
     * @param array $data
     */
    public function load($data) {
        //$data = ArrayHelper::getValue($data, get_class($this->model), []);
        if(!($this->getModel()->load($data, '') && $this->model->validate())) {
            $this->errors = $this->model->errors;
        }

        return $this;
    }

    /**
     * 初始化
     *
     * @param $config 配置数组
     */
    public function preinit() {
        $this->load($this->data);
    }

    /**
     * 此方法已经舍弃，采用yii model 验证机制
     */
    protected function valid() {
        if(isset($this->access['class'])) {
            $access = Yii::createObject($this->access,['rules' => $this->access['rules']]);
            /** @var \common\services\captcha\CaptchaAccess $access */
            $access->valid($this);
        }
    }
}