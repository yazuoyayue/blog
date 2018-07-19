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
    public function actionLogin() {

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome(); // 默认 site/index
        }

        $model = new LoginForm();
        if (\Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post(), 'info') && $model->login()) {
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