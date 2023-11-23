
<h2>Подробно о вот этом</h2>
<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'nameStore',
        'created_at',
        'updated_at',

    ],
]);
echo Html::a('Вернуться к таблице складов', ['stores'], ['class' => 'btn btn-success']);


?>