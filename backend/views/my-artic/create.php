<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MyArtics */

$this->title = 'Create My Artics';
$this->params['breadcrumbs'][] = ['label' => 'My Artics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="my-artics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
