<?php
use frontend\models\Store;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin();


echo $form->field($model, 'name_store');

echo Html::submitButton('Save', ['class' => 'btn btn-success']);

ActiveForm::end();
?>