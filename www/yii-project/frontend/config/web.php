<?php

use frontend\controllers\SiteController;
use frontend\controllers\TablesController;

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
        'request' => [],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'tables' => 'tables/index',
            ],
        ],
        // Other components...
    ],
    'controllerMap' => [
        'site' => SiteController::class,
        'tables' => TablesController::class,
        // Other controllers...
    ],
    'params' => [
        // Other parameters...
    ],
];