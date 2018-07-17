<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MyArtics */

$this->title = 'Update My Artics: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'My Artics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="my-artics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
