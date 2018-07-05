<?php
use arogachev\excel\import\basic\Importer;
use backend\models\Ad;
use yii\helpers\Html;

$importer = new Importer([
    'filePath' => Yii::getAlias('@backend/data/ceshi.xls'),
    'standardModelsConfig' => [
        [
            'className' => Ad::className(),
            //'labels' => ['ad'],
            'standardAttributesConfig' => [
                [
                    'name' => 'id',
                    'label' => 'id',
                    'valueReplacement' => function($value) {
                        return $value;
                        return Ad::find()->select('title')->where(['id' => $value]);
                    }
                ],
                [
                    'name' => 'title',
                    'label' => 'title',
                    'valueReplacement' => function($value) {
                        return $value;
                        return Ad::find()->select('title')->where(['id' => $value]);
                    }
                ],
                [
                    'name' => 'type',
                    'label' => 'type',
                    'valueReplacement' => function ($value) {
                        return $value;
                        return $value ? Html::tag('p', $value) : '';
                    },
                ],
                [
                    'name' => 'image',
                    'label' => 'image',
                    'valueReplacement' => function ($value) {
                        return '333'.$value;
                    },
                ],
            ],
        ],
    ],
]);

if (!$importer->run()) {
    echo $importer->error;

    if ($importer->wrongModel) {
        echo Html::errorSummary($importer->wrongModel);
    }
}
