<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'key')->textInput();?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'gallery')->dropDownList($model->getGalleryArray()) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
