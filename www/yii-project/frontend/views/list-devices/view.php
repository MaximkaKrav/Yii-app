
<h2>Подробно о вот этом</h2>
<?php

use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'serial_number',
        'name_store',
        'about',
        'created_at',
        'updated_at',

    ],
]);


?>