<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/16
 * Time: 11:41
 */

namespace backend\controllers;


use backend\models\LoginForm;
use yii\web\Controller;
use yii\helpers\Url;
use Yii;

class LoginController extends Controller
{
    public $layout = false;  #禁止使用layout布局
    public $enableCsrfValidation = false; #在进行post提交时，会进行过滤跨站脚本攻击的验证

    /**
     * @验证码独立操作  下面这个actions注意一点，验证码调试出来的样式也许你并不满意，这里就可
    以需修改，这些个参数对应的类是@app\vendor\yiisoft\yii2\captcha\CaptchaAction.php,可以参照这个
    类里的参数去修改，也可以直接修改这个类的默认参数，这样这里就不需要改了
     */
    public function actions()
    {
        return  [
//           'captcha' =>
//            [
//               'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],  //默认的写法
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'backColor'=>0x000000,//背景颜色
                'maxLength' => 6, //最大显示个数
                'minLength' => 5,//最少显示个数
                'padding' => 5,//间距
                'height'=>40,//高度
                'width' => 130,  //宽度
                'foreColor'=>0xffffff,     //字体颜色
                'offset'=>4,        //设置字符偏移量 有效果
                //'controller'=>'login',        //拥有这个动作的controller
            ],
        ];
    }

    public function actionLogin() {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome(); // 默认 site/index
        }

        $model = new LoginForm();
        if (\Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post(), 'LoginForm') && $model->login()) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * ---------------------------------------
     * 注销页
     * ---------------------------------------
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Url::toRoute('/login/login'));
    }
}