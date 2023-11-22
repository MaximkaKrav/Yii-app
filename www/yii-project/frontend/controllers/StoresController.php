<?php

namespace frontend\controllers;


use frontend\models\Device;
use frontend\models\SearchStores;
use frontend\models\Store;
use Yii;
use yii\web\Controller;

class StoresController extends Controller{

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


    public function actionStores()
    {
        $searchModel = new SearchStores();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render(
            'tableStores',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }


    public function actionCreate()
    {
        $model = new Store();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['stores']);
        }

        return $this->render('createStore', [
            'model' => $model,
        ]);
    }





    public function actionView($id)
    {
        $model = Store::findOne($id);
        return $this->render('view', ['model' => $model]);
    }


//    кнопка редактирования элементав таблице
    public function actionUpdate($id)
    {
        $model = Store::findOne($id);
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
        $model = Store::findOne($id);
        $model->delete();
        return $this->redirect(['stores']);
    }


}
