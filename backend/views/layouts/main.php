<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/3
 * Time: 15:54
 *
 * @var $this \yii\web\View
 */
use backend\assets\AppAsset;

AppAsset::register($this);
$this->beginPage();
?>
<html>
    <head>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>
       <h3>这是我的后台布局模板</h3>
        <?= $content ?>
    <?php $this->endBody(); ?>
    </body>

</html>

<?php $this->endPage(); ?>
