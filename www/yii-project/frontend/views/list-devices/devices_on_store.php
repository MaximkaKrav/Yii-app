<?php


use yii\grid\GridView;


echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'created_at',
        'about',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>