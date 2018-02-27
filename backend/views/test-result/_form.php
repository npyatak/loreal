<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\CKEditor;
use common\components\ElfinderInput;
?>

<div class="add-form">
    <?php $form = ActiveForm::begin();?>

    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'range_start')->textInput();?>
        </div>
        <div class="col-sm-1">
            <?= $form->field($model, 'range_end')->textInput() ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'image')->widget(ElfinderInput::className());?>
        </div>
    </div>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions('elfinder', [
            'allowedContent' => true,
            'preset' => 'textEditor'
        ])
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
