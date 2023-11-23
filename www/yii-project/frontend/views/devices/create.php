<?php
use frontend\models\Store;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin();


echo $form->field($model, 'nameStore')->dropDownList(
    ArrayHelper::map(Store::find()->all(), 'nameStore', 'nameStore')
);


echo $form->field($model, 'serial_number')->textInput();
echo $form->field($model, 'about')->textInput();

echo Html::submitButton('Save', ['class' => 'btn btn-success']);

ActiveForm::end();
?>