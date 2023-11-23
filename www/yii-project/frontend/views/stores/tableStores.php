<?php


use frontend\models\SearchStores;

use frontend\models\Store;
use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$searchModel = new SearchStores();

$this->registerCssFile("@web/css/style.css", [
    'depends' => [\yii\bootstrap5\BootstrapAsset::class],
    'media' => 'print',
], 'css-print-theme');
$this->registerJsFile(
    '@web/js/modal_script_table.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);

echo Html::a('Добавить', ['create'], ['class' => 'btn btn-success']);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,

    'columns'=>[
        [

                'attribute' => 'nameStore',
                'format' => 'raw',
                'label'=> 'Название магазина',
                'headerOptions' => ['class' => 'title_table'],
                'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'nameStore', //
                'data' => ArrayHelper::map(Store::find()->all(),'nameStore','nameStore'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'hideSearch' => true,
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'выбрать магазин',
                    'value' => '',

                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'selectOnClose' => true,
                ],
            ]),

                'value' => function ($model) {
                    return Html::a(
                        $model->nameStore,
                        '#',
                        [
                            'data-name-store' => $model->nameStore,
                            'data-target' => 'modal',
                        ]
                    );
                },




        ],
        [
                'attribute' => 'created_at',
                'format' => 'raw',
                'label'=> 'Дата создания',
                'headerOptions' => ['class' => 'title_table'],
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['class' => 'title_table'],

        ],
    ]
]);

echo Html::a('Сбросить фильтр', ['stores'], ['class' => 'btn btn-success']);

?>


<!--МОдальное окно-->
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <!-- Здесь будет выводиться содержимое представления store.php -->
        <div class="modal-body"></div>
    </div>
</div>
