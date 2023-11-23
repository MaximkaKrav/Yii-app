<?php

use frontend\models\Store;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
<?= $form->field($model, 'serial_number') ?>
<?= $form->field($model, 'nameStore')->dropDownList(
    ArrayHelper::map(Store::find()->all(), 'nameStore', 'nameStore')
) ?>

<?= $form->field($model, 'about') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            <?=  Html::a('Cancel', ['devices'], ['class' => 'btn btn-primary'])?>

        </div>
    </div>
<?php ActiveForm::end() ?>