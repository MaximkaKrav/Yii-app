<?php


namespace frontend\views;

use frontend\models\SearchDevices;
use frontend\models\Store;
use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;


$this->registerCssFile("@web/css/style.css", [
    'depends' => [\yii\bootstrap5\BootstrapAsset::class],
    'media' => 'print',
], 'css-print-theme');
$this->registerJsFile(
    '@web/js/modal_script_table.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);


/* @var $searchModel frondend\models\SearchDevices */
/* @var $dataProvider yii\data\ActiveDataProvider */



$searchModel = new SearchDevices();



echo Html::a('Добавить', ['create'], ['class' => 'btn btn-success']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'serial_number',
            'label' => 'Серийный номер',
            'headerOptions' => ['class' => 'title_table'],
        ],

        [
            'attribute' => 'store_id',
            'format' => 'raw',
            'label'=> 'Магазин',
            'headerOptions' => ['class' => 'title_table'],

            'value' => function ($model) {
                return Html::a(
                    $model->name_store,
                    '#',
                    [
                        'data-store-id' => $model->store_id,
                        'data-target' => 'modal',
                    ]
                );
            },

            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'name_store', //
                'data' => ArrayHelper::map(Store::find()->all(),'name_store','name_store'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'hideSearch' => true,
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'выбрать магазин',
                    'id'=>'storeId',
                    'value' => '',

                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'selectOnClose' => true,
                ],
            ])
        ],
        [
                'attribute' => 'about',
                'format' => 'raw',
                'label'=> 'Описание',
                'headerOptions' => ['class' => 'title_table'],

            ],
        [
            'attribute' => 'created_at',
            'headerOptions' => ['class' => 'title_table'],
            'format' => 'raw',
            'label'=> 'Дата создания',

        ],
        [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'headerOptions' => ['class' => 'title_table'],

        ],
    ],
]);
echo Html::a('Сбросить фильтр', ['table'], ['class' => 'btn btn-success']);

?>


<!--МОдальное окно-->
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <!-- Здесь будет выводиться содержимое представления store.php -->
        <div class="modal-body"></div>
    </div>
</div>





