<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\ElfinderInput;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'title')->textInput();?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'image')->widget(ElfinderInput::className());?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'show_on_main')->checkbox();?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'url_1')->textInput();?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'url_2')->textInput();?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'url_3')->textInput();?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
