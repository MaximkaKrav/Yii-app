
<h2>Подробно о вот этом</h2>
<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'serial_number',
        'nameStore',
        'about',
        'created_at',
        'updated_at',

    ],
]);
echo Html::a('Вернуться к таблице устройств', ['devices'], ['class' => 'btn btn-success']);


?>