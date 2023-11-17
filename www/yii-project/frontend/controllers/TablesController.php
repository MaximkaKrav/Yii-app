<?php

namespace frontend\controllers;

use frontend\models\Device;
use frontend\models\SearchDevices;
use frontend\models\TablesDeviceAndStoreModel;
use Yii;
use yii\base\InvalidConfigException;
use yii\captcha\CaptchaAction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\ErrorAction;

class TablesController extends Controller{

    public function actions()
    {
        return [
            'error' => [
                'class' =>ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SearchDevices();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('tables.php', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

//    public function actionTables()
//    {
//        $dataProvider = new ActiveDataProvider(
//            [
//                'query' => Device::find(),
//                'pagination' => [
//                    'pageSize' => 20,
//                ],
//            ]
//        );
//
//        return $this->render(
//            'tables',
//            [
//                'dataProvider' => $dataProvider,
//            ]
//        );
 //}

    public function actionView($id)
    {
        $model = Device::findOne($id);
        return $this->render('view', ['model' => $model]);
    }

    /**
     * @throws InvalidConfigException
     */
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

    public function actionDelete($id)
    {
        $model = Device::findOne($id);
        $model->delete();
        return $this->render('tables.php');
    }

    public function actionStore($store_id)
    {
        $dataProvider = new \yii\data\ActiveDataProvider(
            [
                'query' => Device::find()->where(['store_id' => $store_id]),
            ]
        );

        return $this->render('store', ['dataProvider' => $dataProvider]);
    }
    public function actionCreate()
    {
        $model = new Device();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goBack();
        }

        return $this->render(
            'create.php',
            [
                'model' => $model,
            ]
        );
    }



    public function actionStores($store_id)
    {
        $dataProvider = new ActiveDataProvider(
            [
                'query' => Device::find()->where(['store_id' => $store_id]),
            ]
        );

        return $this->renderPartial(
            'store.php',
            [
                'dataProvider' => $dataProvider,
            ]
        );
    }
}