<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CustomCKEditor;
use kartik\date\DatePicker;
use common\components\ElfinderInput;
?>

<div class="week-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'imageFile')->fileInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dateStartFormatted')->widget(
                DatePicker::className()
            );?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'dateEndFormatted')->widget(
                DatePicker::className()
            );?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'video_1')->widget(ElfinderInput::className(), [
                'path' => 'video',
                'filter' => 'video'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'video_2')->widget(ElfinderInput::className(), [
                'path' => 'video',
                'filter' => 'video'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'preview_1')->widget(ElfinderInput::className()) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'preview_2')->widget(ElfinderInput::className()) ?>
        </div>
    </div>

    <?= $form->field($model, 'description_1')->textarea() ?>
    
    <?= $form->field($model, 'description_2')->textarea() ?>

    <?//= $form->field($model, 'status')->dropDownList(get_class($model)::getStatusArray(), ['class'=>'']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
