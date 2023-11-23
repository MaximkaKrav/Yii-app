<?php
use frontend\models\Store;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin();


echo $form->field($model, 'nameStore');

echo Html::submitButton('Save', ['class' => 'btn btn-success']);

ActiveForm::end();
?>