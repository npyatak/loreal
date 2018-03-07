<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="screen-1">
    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'post-image-form',
        ],
    ]); ?>

    <?= $form->field($model, 'imageFile')->fileInput();?>
    
    <?php ActiveForm::end(); ?>

    <!-- другие работы пользователя -->
    <?php if(false && count(Yii::$app->user->identity->posts) > 0):?>
        <h2 class="">Другие работы:</h2>
        <?php foreach (Yii::$app->user->identity->posts as $post):?>
            <?=$this->render('_user_post', ['post' => $post]);?>
        <?php endforeach;?>
    <?php endif;?>
</div>