<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3
 * Time: 15:55
 */

namespace backend\controllers;


use backend\models\Menu;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use backend\models\ContactForm;
use Yii;

/*
	测试
*/

class TestController extends Controller
{
    public $layout = "main";

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            /*
            upload是上传服务器地址的action,在UEditorAction这个类去定义的
            $this->_options = [
                'serverUrl' => Url::to(['upload']),
                ..
            ];
            */
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    //"imageUrlPrefix"  => "http://www.baidu.com",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}" //上传保存路径
                ],
            ]
        ];
    }

    public function actionIndex() {
        var_dump('test');
        //var_dump(Yii::getAlias("@backend/runtime"));exit;
        chmod(Yii::getAlias("@backend/runtime"), 0777);
        exit;
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            $data = [ 'ss',  'yii2'];
            return $this->render('contact', [
                'model' => $model,
                'data' => $data,
            ]);
        }
    }

    public function actionSearchTitle ()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => [['id' => '', 'text' => '']]];
        $q = yii::$app->request->get('q', '');
        if (!$q) {
            return $out;
        }

        $data = Menu::find()
            ->select('id, title as text')
            ->andFilterWhere(['like', 'title', $q])
            ->limit(50)
            ->asArray()
            ->all();
        //$data = ArrayHelper::map($data, 'id', 'text');
        $out['results'] = array_values($data);

        return $out;
    }

    public function actionRule() {
        $model = new ContactForm();
        $model->setScenario('scenario2');
        $data = [
            'ContactForm' => [
                'subject' => 22,
                'email' => '22',
                'name' => '22',
                'body' => 'ww'
            ]
        ];
        $model->load($data);
        if($model->validate()) {
            echo 1;
        } else {
            var_dump($model->getErrors());
            echo 0;
        }
    }



}