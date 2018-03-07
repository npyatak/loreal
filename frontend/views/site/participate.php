<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['bodyClass'] = 'page-participate';
?>

<!-- Less js  -->
<link rel="stylesheet/less" type="text/css" href="/frontend/web/css/styles.less" />
<script>
  less = {
    env: "development",
    async: false,
    fileAsync: false,
    poll: 1000,
    functions: {},
    dumpLineNumbers: "comments",
    relativeUrls: false,
    rootpath: ":/loreal2018.promo-group.org/"
  };
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>

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
            
            <div class="user__name">Vasilyeva oksana</div>
            
            <div class="user__img">
                <img src="/images/participate/oksi.jpg" alt="">
            </div>

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
                        Выполняй задание<br/> 
                        и загружай фото в <a href="#"><i class="vk">&nbsp;</i></a> и <a href="#"><i class="insta">&nbsp;</i></a>
                    </div>
                </div>
                <div class="step step-3">
                    <div class="s-number">3</div>
                    <div class="s-body">
                        Получай призы от L’OrÉal Paris
                    </div>
                </div>
            </div>

        </div>
        
        <div class="upload-makeup-photo">

            <div class="ump__title">Загрузи фото мэйкапа на хэллоуин</div>

            <div class="ump__img">
                <img src="" alt="">
                <div class="upload-lbl">Загрузи фото</div>
            </div>

            <div class="ump__controls">
                <div class="btn__upload"><a href="#">&nbsp;</a></div>
                <div class="btn__repeat"><a href="#">&nbsp;</a></div>
                <div class="btn__edit"><a href="#">&nbsp;</a></div>
            </div>

        </div>

        <div class="full-rules"><a href="#">Полные правила</a></div>

        <div class="style-comics"><a href="#">Выбрать мэйкап в стиле комиксов</a></div>

        <div class="ready"><a href="#">Готово!</a></div>

        
        <div class="gallery-his-turn">

            <h2 class="title-gallery">твои Другие работы</h2>

            <div class="view view-voting">

                <div class="view-content">

                    <div class="view-row">    
                        <div class="field-points-label score">1</div>
                        <div class="field-image">
                            <img src="http://oxanavasil.uw-t.com/uploads/post/39/0d7ea787e2d4464cbfc84fd754edda58.jpg" alt="">
                        </div>
                            <div class="field-points">
                            Баллы: <span class="score">1</span>
                        </div>
                        
                        <div class="field-vote">
                            <a class="login-modal-btn">Голосовать</a>    
                        </div>
                    </div>

                    <div class="view-row">    
                        <div class="field-points-label score">1</div>
                        <div class="field-image">
                            <img src="http://oxanavasil.uw-t.com/uploads/post/39/0d7ea787e2d4464cbfc84fd754edda58.jpg" alt="">
                        </div>
                            <div class="field-points">
                            Баллы: <span class="score">1</span>
                        </div>
                        
                        <div class="field-vote">
                            <a class="login-modal-btn">Голосовать</a>    
                        </div>
                    </div>

                    <div class="view-row">    
                        <div class="field-points-label score">1</div>
                        <div class="field-image">
                            <img src="http://oxanavasil.uw-t.com/uploads/post/39/0d7ea787e2d4464cbfc84fd754edda58.jpg" alt="">
                        </div>
                            <div class="field-points">
                            Баллы: <span class="score">1</span>
                        </div>
                        
                        <div class="field-vote">
                            <a class="login-modal-btn">Голосовать</a>    
                        </div>
                    </div>

                    <div class="view-row">    
                        <div class="field-points-label score">1</div>
                        <div class="field-image">
                            <img src="http://oxanavasil.uw-t.com/uploads/post/39/0d7ea787e2d4464cbfc84fd754edda58.jpg" alt="">
                        </div>
                            <div class="field-points">
                            Баллы: <span class="score">1</span>
                        </div>
                        
                        <div class="field-vote">
                            <a class="login-modal-btn">Голосовать</a>    
                        </div>
                    </div>

                    <div class="view-row">    
                        <div class="field-points-label score">1</div>
                        <div class="field-image">
                            <img src="http://oxanavasil.uw-t.com/uploads/post/39/0d7ea787e2d4464cbfc84fd754edda58.jpg" alt="">
                        </div>
                            <div class="field-points">
                            Баллы: <span class="score">1</span>
                        </div>
                        
                        <div class="field-vote">
                            <a class="login-modal-btn">Голосовать</a>    
                        </div>
                    </div>

                </div>

            </div>

        </div>


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
    
<<<<<<< HEAD
=======
    <?php ActiveForm::end(); ?>

    <!-- другие работы пользователя -->
    <?php if(false && count(Yii::$app->user->identity->posts) > 0):?>
        <h2 class="">Другие работы:</h2>
        <?php foreach (Yii::$app->user->identity->posts as $post):?>
            <?=$this->render('_user_post', ['post' => $post]);?>
        <?php endforeach;?>
    <?php endif;?>
>>>>>>> 995554c770831f0e091e73c725ae1de76edc8ec9
</div>