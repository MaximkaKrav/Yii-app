<?php


namespace frontend\views;

use frontend\models\SearchDevices;
use frontend\models\Store;
use kartik\select2\Select2;
use yii\bootstrap5\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;


$this->registerCssFile("@web/css/style.css", [
    'depends' => [\yii\bootstrap4\BootstrapAsset::class],
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
        'serial_number',

        [
            'attribute' => 'store_id',
            'format' => 'raw',

            'value' => function ($model) {
                return Html::a(
                    $model->store_id,
                    '#',
                    [
                        'data-store-id' => $model->store_id,
                        'data-target' => 'modal',
                    ]
                );
            },

            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'store_id', //
                'data' => ArrayHelper::map(Store::find()->all(),'store_id','store_id'),
                'theme' => Select2::THEME_BOOTSTRAP,
                'hideSearch' => true,
                'options' => [
                    'class' => 'form-control',
                    'placeholder' => 'Select a store ...',
                    'id'=>'storeId'
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'selectOnClose' => true,
                ],
            ])
        ],
        'about',
        'created_at',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);

?>
<!--МОдальное окно-->
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <!-- Здесь будет выводиться содержимое представления store.php -->
        <div class="modal-body"></div>
    </div>
</div>





