<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CustomCKEditor;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Week */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="week-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'dateStartFormatted')->widget(
        DatePicker::className()
    );?>

    <?= $form->field($model, 'dateEndFormatted')->widget(
        DatePicker::className()
    );?>

    <?= $form->field($model, 'description_1')->textarea() ?>
    
    <?= $form->field($model, 'description_2')->textarea() ?>

    <?//= $form->field($model, 'status')->dropDownList(get_class($model)::getStatusArray(), ['class'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
