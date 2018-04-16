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
use Yii;

class LoginController extends Controller
{
    public $layout = false;
    public $enableCsrfValidation = false;
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
}