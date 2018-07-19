<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3
 * Time: 15:55
 */

namespace backend\controllers;


use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex() {
        return $this->render('index');
    }
}