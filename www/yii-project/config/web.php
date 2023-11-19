<?php




return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=localhost:33060;dbname=yii2advanced',
            'username' => 'yii2advanced',
            'password' => 'secret',
        ],
        'request' => [

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'list-devices' => 'list-devices/table',
            ],
        ],

        // ...
    ],
    'controllerMap' => [
        'table' => \frontend\controllers\ListDevicesController::class,
    ],
    'params' => [
        // ...
    ],
];
