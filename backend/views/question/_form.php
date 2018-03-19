<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\TabularInput;
use common\components\ElfinderInput;
?>

<div class="form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=$form->errorSummary($model);?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'status')->dropDownList($model->getStatusArray()) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'type')->dropDownList($model->getTypeArray()) ?>
        </div>
        <div class="col-sm-4">
    		<?= $form->field($model, 'image')->widget(ElfinderInput::className());?>
    	</div>
    </div>

    <?= $form->field($model, 'comment')->textarea(['rows' => 4]) ?>

	<hr>

    <div class="tabular-input">
	    <h4>Ответы</h4>
		<?= TabularInput::widget([
			'min' => 2,
			'rendererClass' => '\common\components\CustomTableRenderer',
			'removeButtonOptions' => [
				'label' => 'X',
			],
	        'addButtonOptions' => [
	            'label' => 'Добавить',
	            'class' => 'btn btn-primary'
	        ],
	        'addButtonPosition' => TabularInput::POS_FOOTER,
		    'models' => $answerModels,
		    'columns' => [
		        [
		            'name'  => 'id',
		            'type'  => 'hiddenInput',
		        ],
		        [
		        	'title' => 'Заголовок',
		        	'name' => 'title',
	                'enableError' => true,
		            'options' => [
		            	'class' => 'w170px'
		        	],
		        ],
		        [
		        	'title' => 'Баллы',
		        	'name' => 'score',
	                'enableError' => true,
		            'options' => [
		            	'class' => 'w40px'
		        	],
		        ],
		        // [
		        // 	'title' => 'Верный',
		        // 	'name' => 'is_right',
		        //     'type'  => 'checkbox',
		        //     'options' => [
		        //     	'class' => 'w40px'
		        // 	],
		        // ],
		        [
		        	'title' => 'Изображение',
		            'name'  => 'image',
		            'type'  => ElfinderInput::className(),
		            'options' => [
		            	'class' => 'w200px',
		            	'buttonName' => 'О',
		        	],
		        ],
		        [
		        	'title' => 'Заголовок комментария',
		        	'name' => 'comment_title',
		        ],
		        [
		        	'title' => 'Комментарий',
		        	'name' => 'comment',
		        ],
		    ],
		]) ?>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
