<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\ElfinderInput;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>
    <?php $params = Yii::$app->params['defaultShare'];?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'uri')->textInput(['placeholder' => '/uri']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['placeholder' => $params['title']]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'image')->widget(ElfinderInput::className(['placeholder' => $params['image']]));?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'text')->textarea(['placeholder' => $params['text']]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'twitter')->textarea(['placeholder' => $params['twitter']]);?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
