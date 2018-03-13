<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['bodyClass'] = 'page-participate';
?>

<div class="participate-screen">

    <div class="participate_bg-top">&nbsp;</div>
    <div class="participate_bgr-test">&nbsp;</div>
    <div class="participate_bulbs">&nbsp;</div>
    <div class="participate_glow-red">&nbsp;</div>

    <div class="container ps__container">
        
        <div class="ps__makeup">
            <a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
        </div>
        <div class="ps__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
        <div class="ps__subtitle">#lorealparis_мейкаперы</div>
        <div class="ps__intro">Вдохновляйся и Покажи, на что <br>ты способен!</div>
        
        <div class="user">
            
            <div class="user__name"><?=$user->fullName;?></div>
            <?php if($user->image):?>
                <div class="user__img">
                    <img src="<?=$user->image;?>" alt="">
                </div>
            <?php endif;?>
        </div>

        <div class="step-region">
            <div class="steps">
                <div class="step step-1">
                    <div class="s-number">1</div>
                    <div class="s-body">
                        Смотри тьюториалы
                    </div>
                </div>
                <div class="step step-2">
                    <div class="s-number">2</div>
                    <div class="s-body">
                        ВЫПОЛНЯЙ ЗАДАНИЕ <br/> 
                        И РАЗМЕЩАЙ ФОТО В <a href="#"><i class="vk">&nbsp;</i></a> И <a href="#"><i class="insta">&nbsp;</i></a> <br/>
                        ПОД #LOREALPARIS_МЕЙКАПЕРЫ<br/>
                        ИЛИ ЗАГРУЖАЙ НА САЙТ 
                    </div>
                </div>
                <div class="step step-3">
                    <div class="s-number">3</div>
                    <div class="s-body">
                        ЗОВИ ДРУЗЕЙ ГОЛОСОВАТЬ НА САЙТ И ПОЛУЧАЙ ПРИЗЫ ОТ L'ORÉAL PARIS
                    </div>
                </div>
            </div>

        </div>
        
        <div class="upload-makeup-photo">
            <div class="ump__title">Загрузи фото мэйкапа <span>на хэллоуин</span></div>
            <?php $form = ActiveForm::begin([
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'id' => 'post-image-form',
                    'no-validate' => ''
                ],
            ]); ?>

                <?=$form->field($model, "imageFile")->widget(frontend\widgets\cropimage\ImageCropSection::className(), [
                    'form' => $form,
                    //'label' => $currentWeek->hint_2,
                    'options' => [
                        'id' => 'post-imagefile',
                        'class' => 'hidden',
                    ],
                    'attribute_x'=>'x',
                    'attribute_y'=>'y',
                    'attribute_width'=>'w',
                    'attribute_height'=>'h',
                    'attribute_scale'=>'scale',
                    'attribute_angle'=>'angle',
                    'class_block'=>'center-block',
                    'plugin_options' => [
                        'width' => Yii::$app->params['postImageSize']['width'],
                        'height' => Yii::$app->params['postImageSize']['height'],
                        'id_input_file' => 'post-imagefile',
                        'section' => 'image'
                    ],
                    'template_image'=> isset($model->id) && $model->getImageUrl($model->id,false) ? Html::img($model->getImageUrl($model->id),$model::IMAGE_WIDGET_CONFIGS['section1']) : null
                ])->label(false);?>

                <?=$form->field($model, 'type', ['template' => '{input}'])->hiddenInput();?>
                
            <?php ActiveForm::end(); ?>
        </div>

        <div class="full-rules"><a href="<?=Url::toRoute(['site/rules']);?>" class="popup-rules">Полные правила</a></div>

        <div class="style-comics"><a href="#">Выбрать мэйкап <span>в стиле комиксов</span></a></div>

        <div class="ready"><a href="#">Готово!</a></div>

        <?php if(count($user->posts) > 0):?>
        <div class="gallery-his-turn">
            <h2 class="title-gallery">твои Другие работы</h2>
            <div class="view view-voting">
                <div class="view-content">
                <?php foreach ($user->posts as $post):?>
                    <div class="view-row">    
                        <div class="field-points-label score"><?=$post->score;?></div>
                        <div class="field-image">
                            <img src="<?=$post->imageUrl;?>" alt="">
                        </div>
                            <div class="field-points">
                            Баллы: <span class="score"><?=$post->score;?></span>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>
</div>

<?php
$script = "
    $(document).on('click', '.ready a', function(e) {
        $('#post-image-form').submit();

        return false;
    });

    var type1 = 'на хэллоуин';
    var type2 = 'в стиле комиксов';

    $(document).on('click', '.style-comics a', function(e) {
        if($('#post-type').val() == 1) {
            $('#post-type').val(2);
            $('.style-comics span').html(type1);
            $('.ump__title span').html(type2);
        } else {
            $('#post-type').val(1);
            $('.style-comics span').html(type2);
            $('.ump__title span').html(type1);
        }

        return false;
    });
";

$this->registerJs($script, yii\web\View::POS_END);
?>