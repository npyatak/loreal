<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\components\ElfinderInput;
use unclead\multipleinput\TabularInput;
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

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <div class="tabular-input">
        <h4>Ссылки</h4>
        <?= TabularInput::widget([
            'min' => 0,
            'rendererClass' => '\common\components\CustomTableRenderer',
            'removeButtonOptions' => [
                'label' => 'X',
            ],
            'addButtonOptions' => [
                'label' => 'Добавить',
                'class' => 'btn btn-primary'
            ],
            'addButtonPosition' => TabularInput::POS_FOOTER,
            'models' => $productLinkModels,
            'columns' => [
                [
                    'name'  => 'id',
                    'type'  => 'hiddenInput',
                ],
                [
                    'title' => 'Ссылка',
                    'name' => 'url',
                    'enableError' => true
                ],
                [
                    'title' => 'Текст',
                    'name' => 'title',
                    'enableError' => true
                ],
            ],
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
