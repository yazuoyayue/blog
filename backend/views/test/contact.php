<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true])  ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

            <?= $form->field($model, 'content')->widget(\kucha\ueditor\UEditor::className(),['id'=>'content','name'=>'content','clientOptions' => [
                //编辑区域大小
                'initialFrameHeight' => '200',]]) ?>

            <?=  $form->field($model, 'name')->widget(Select2::classname(), [
                'options' => ['placeholder' => '请输入标题名称 ...'],
                'pluginOptions' => [
                    'multiple' => true,  #多选
                    'placeholder' => 'search ...',
                    'allowClear' => true,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting...'; }"),
                    ],
                    'ajax' => [
                        'url' => \yii\helpers\Url::to(['test/search-title']),  #数据源
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
//                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
//                    'templateResult' => new JsExpression('function(res) { return res.text; }'),
//                    'templateSelection' => new JsExpression('function (res) { return res.text; }'),
                ],
            ]);?>


            <?php

            Modal::begin([
            'options' => [
            'id' => 'kartik-modal3333',
            //'tabindex' => false // important for Select2 to work properly
            ],
            'header' => '22',
            'toggleButton' => ['label' => 'Show Modal', 'class' => 'btn btn-lg btn-primary'],
            ]);
            echo '2222';
//            echo Select2::widget([
//            'name' => 'state_40',
//            'data' => $data,
//            'options' => ['placeholder' => 'Select a state ...'],
//            'pluginOptions' => [
//            'allowClear' => true
//            ],
//            ]);
            Modal::end();


            Modal::begin([
                'id' => 'common-modal',
                'header' => '<h4 class="modal-title"></h4>',
                'footer' =>  '<a href="#" class="btn btn-primary" data-dismiss="modal">关闭</a>',
                //'toggleButton' => ['label' => 'Show Modal', 'class' => 'btn btn-lg btn-primary'],
            ]);


            $js = <<<JS
$(".modaldialog").click(function(){
        aUrl = $(this).attr('data-url');
        aTitle = $(this).attr('data-title');
        console.log(aTitle);
        console.log(aUrl);

        $($(this).attr('data-target')+" .modal-title").text(aTitle);
        $($(this).attr('data-target')).modal("show")
             .find(".modal-body")
             .load(aUrl);
        return false;
   });
JS;
            $this->registerJs($js);

            Modal::end();

            echo Html::a('修改密码', '/account/changepwd', [
                'id' => 'account-changepwd',
                'class' => 'modaldialog',
                'data-toggle' => 'modal',
                'data-url' => Url::toRoute(['/account/changepwd']),
                'data-title' => '修改密码',
                'data-target' => '#common-modal',
            ])
            ?>


                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
