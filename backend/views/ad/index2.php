<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $model common\modelsgii\Ad */
/* @var $dataProvider yii\data\ActiveDataProvider  */
/* @var $searchModel backend\models\search\AdSearch */

/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '广告管理';
$this->params['title_sub'] = 'test ad ...';  // 在\yii\base\View中有$params这个可以在视图模板中共享的参数

$columns = [
    [
        'class' => \common\core\CheckboxColumn::className(),
        'name'  => 'id',
        'options' => ['width' => '20px;'],
        'checkboxOptions' => function ($model, $key, $index, $column) {
            return ['value' => $key,'label'=>'<span></span>','labelOptions'=>['class' =>'mt-checkbox mt-checkbox-outline','style'=>'padding-left:19px;']];
        }
    ],
    [
        'header' => 'ID',
        'attribute' => 'id',
        'options' => ['width' => '50px;']
    ],
    [
        'header' => '类型',
        'options' => ['width' => '150px;'],
        'attribute' => 'type'
    ],
    [
        'label' => '标题5',
        'options' => ['width' => '150px;'],
        'header' => '标题2',  #head不带排序功能， label带排序,header优先label
        'attribute' => 'title'
    ],
    [
        'label' => '排序',
        'value' => 'sort',
        'options' => ['width' => '50px;'],
    ],
    [
        'label' => '状态',
        'options' => ['width' => '50px;'],
        'content' => function($model){
            return '正常';
        }
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'header' => '操作',
        'template' => '{update}',
        'options' => ['width' => '200px;'],
        'buttons' => [
            'update' => function ($url, $model, $key) {
                return Html::a('编辑', $url, [
                    'title' => Yii::t('app', '编辑'),
                ]);
            },
//            'delete' => function ($url, $model, $key) {
//                return Html::a('<i class="fa fa-times"></i>', $url, [
//                    'title' => Yii::t('app', '删除'),
//                    'class' => 'btn btn-xs red ajax-get confirm'
//                ]);
//            },
        ],
    ],
];


?>

<?php
echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $columns,
    'encoding' => 'utf-8',
    'dropdownOptions' => [
        'label' => '导出',
        'class' => 'btn btn-default'
    ],
//    'exportConfig' => [
//        ExportMenu::FORMAT_TEXT => false,
//        ExportMenu::FORMAT_PDF => false,
//        ExportMenu::FORMAT_EXCEL_X => FALSE,
//    ],
    'columnSelectorOptions'=>[
        'label' => '选择字段',
    ],
    'filename' => '试用申请列表_'.date('Y-m-d'),
    'selectedColumns'=> [1, 2, 3], // 导出不选中#和操作栏
    'hiddenColumns'=>[0, 6], // 隐藏#和操作栏
])
?>

<div class="portlet light portlet-fit portlet-datatable bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">管理信息</span>
        </div>
        <div class="actions">
            <div class="btn-group btn-group-devided">
                <?=Html::a('添加 <i class="fa fa-plus"></i>',['add'],['class'=>'btn green','style'=>'margin-right:10px;'])?>
                <?=Html::a('删除 <i class="fa fa-times"></i>',['delete'],['class'=>'btn green ajax-post confirm','target-form'=>'ids','style'=>'margin-right:10px;'])?>
            </div>
            <div class="btn-group">
                <button class="btn blue btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                    工具箱
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="javascript:;"><i class="fa fa-pencil"></i> 导出Excel </a></li>
                    <li class="divider"> </li>
                    <li><a href="javascript:;"> 其他 </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="portlet-body">
        <?php \yii\widgets\Pjax::begin(['options'=>['id'=>'pjax-container']]); ?>
        <div>
            <?php echo $this->render('_search', ['model' => $searchModel]); ?> <!-- 条件搜索-->
        </div>
        <div class="table-container">
            <form class="ids">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider, // 列表数据
                    'filterModel' => $searchModel, // 开启搜索
                    'options' => ['class' => 'grid-view table-scrollable'],
                    /* 表格配置 */
                    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer'],
                    /* 重新排版 摘要、表格、分页 */
                    'layout' => '{items}<div class=""><div class="col-md-5 col-sm-5">{summary}</div><div class="col-md-7 col-sm-7"><div class="dataTables_paginate paging_bootstrap_full_number" style="text-align:right;">{pager}</div></div></div>',
                    /* 配置摘要 */
                    'summaryOptions' => ['class' => 'pagination'],
                    /* 配置分页样式 */
                    'pager' => [
                        'options' => ['class'=>'pagination','style'=>'visibility: visible;'],
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'firstPageLabel' => '第一页',
                        'lastPageLabel' => '最后页'
                    ],
                    /* 定义列表格式 */
                    'columns' => $columns,
                ]); ?>
            </form>
        </div>
        <?php \yii\widgets\Pjax::end(); ?>
    </div>
</div>