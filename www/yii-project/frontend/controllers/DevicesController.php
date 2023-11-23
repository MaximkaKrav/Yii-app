<?php

namespace frontend\controllers;

use frontend\models\Device;
use frontend\models\SearchDevices;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DevicesController extends Controller{
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

//    таблица
    public function actionDevices()
    {
        $searchModel = new SearchDevices();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render(
            'devices',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

//    кнопка просмотра элемента в таблице
    public function actionView($id)
    {
        $model = Device::findOne($id);
        return $this->render('view', ['model' => $model]);
    }


//    кнопка редактирования элементав таблице
    public function actionUpdate($id)
    {
        $model = Device::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->formatter->asDatetime(date('Y-d-m h:i:s'));
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('edit', ['model' => $model]);
    }


//     кнопка удаления элементав таблице
    public function actionDelete($id)
    {
        $model = Device::findOne($id);
        $model->delete();
        return $this->redirect(['devices']);
    }


//  кнопка создания элементав таблице
    public function actionCreate()
    {
        $model = new Device();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }




//    просмотр девайсов в конкретном складе модальным окном
    public function actionStoresList($nameStore)
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Device::find()->where(['nameStore' => $nameStore ]),
        ]);

        return $this->renderPartial('devices', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->status == 10;
                        },

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


}