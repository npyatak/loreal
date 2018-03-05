<?php
use yii\helpers\Url;

$this->params['bodyClass'] = 'page-front page-new-front';
?>
<!-- ЗНАЮ, что не тут должно быть. Я не оч в уии. -->
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

<div class="screen-1">
    <div class="s1__bg-woman">&nbsp;</div>
    <div class="container s1__container">
        <div class="s1__makeup">
            <a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/s1-new/s1__makeup-7d501bd791.jpg" alt=""></a>
        </div>
        <div class="s1__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
        <div class="s1__subtitle">#lorealparis_мейкаперы</div>
        <div class="s1__two-col">
            <div class="s1__tc-1">
                <div class="tc1-block1">
                    <a href="#">Вдохновляйся и<br/> покажи, на что<br/> ты способен!</a>
                </div>
                <div class="tc1-block2">
                    <a href="<?=Url::toRoute(['site/videos', '#' => 'tutorial']);?>">Тьюториалы</a>
                </div>
            </div>
            <div class="s1__tc-2">
                <div class="tc2-block1">
                    <a href="#">Сделай мейк круче, чем участники проекта, и получай призы!</a>
                </div>
                <div class="go-participate">
                    <a href="#screen-3" class="anchor-link">Участвовать</a>
                </div>
            </div>
        </div>
    </div>

    <div class="step-region">
        <div class="container sr__container">
            
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
                        и размещай фото в <a href="#"><i class="vk">&nbsp;</i></a> и <a href="#"><i class="insta">&nbsp;</i></a>
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
    </div>

</div>

<div class="stage">
    <div class="container st__container">
        <div class="st__title">Этап 1</div>
        <div class="st__subtitle">8 марта - 21 марта</div>
        <div class="st__full-reg"><a href="#">Полные правила</a></div>

        <div class="st__blocks">
            <div class="st__block st__block-1">
                <div class="stb-img" style="background-image: url('/images/new-index/super-woman.png');"><img src="/images/new-index/super-woman.png" alt=""></div>
                <div class="stb-play"><img src="/images/new-index/st__play.png" alt=""></div>
                <div class="stb-tit-wrap">
                    <div class="stb-title">С 8 марта по 21 марта</div>
                    <div class="stb-subtitle">Супер-женщина</div>
                </div>
            </div>
            <div class="st__block st__block-2">
                <div class="stb-img" style="background-image: url('/images/new-index/from-pic.png');"><img src="/images/new-index/from-pic.png" alt=""></div>
                <div class="stb-play"><img src="/images/new-index/st__play.png" alt=""></div>
                <div class="stb-tit-wrap">
                    <div class="stb-title">С 8 марта по 21 марта</div>
                    <div class="stb-subtitle">Как с картины</div>
                </div>
            </div>
        </div>

        <div class="st__see-all-tutor">
            <a href="#">Смотри все тьюториалы от L'Oréal Paris</a>
        </div>

    </div>
</div>

<div id="stage-popup">
    <div class="sp__close"><img src="/images/test__close-010fb6bdbf.png" alt=""></div>
    <div class="sp__content">
        
        <div class="first">
            <div class="first__number number">1</div>
            <div class="first__title">Смотри тьюториал</div>
            <div class="first__date">С 8 марта по 21 марта</div>
            <div class="first__name">Как с картины</div>
            <div class="first__video">
                <div class="video-back" style="background-image: url('/images/new-index/sp__video-back.jpg');">
                    <img src="/images/new-index/sp__video-back.jpg" alt="">
                </div>
                <div class="video-play">
                    <img src="/images/new-index/sp__video-play.png" alt="">
                </div> 
                <video id="video1">
                    <source src="/video/mov_bbb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="first__see-tutor">
                <a href="#">Смотреть тьюториал по заданию «Чудо женщина»</a>
            </div>
        </div>

        <div class="second">
            <div class="second__number number">2</div>
            <div class="second__content content-style">
                Выполняй задание и<br/> размещай фото<br/> в <a href="#"><i class="vk">&nbsp;</i></a> и <a href="#"><i class="insta">&nbsp;</i></a>
            </div>
        </div>

        <div class="third">
            <div class="third__number number">3</div>
            <div class="third_content content-style">
                Получай призы от
            </div>
        </div>

        <div class="lp">
            <a href="#"><img src="/images/new-index/sp__lp.svg" alt=""></a>
        </div>

        <div class="full-reg">
            <a href="#">Полные правила</a>
        </div>

    </div>
</div>

<div id="overlay-stagepopup" class="overlay">&nbsp;</div>

<div class="screen-2">
    <div class="s2__zasvet">&nbsp;</div>
    <div class="container s2__container">
        <div class="s2__title">Брось вызов вместе с</div>
        <div class="s2__lp">
            <a href=""><img src="/images/s2__lp-eb2ed34ae8.svg" alt=""></a>
        </div>
        <div class="product-union scroll-pane horizontal-only">
            <?php if($products):?>
            <div class="products">
                <?php foreach ($products as $product):?>
                <div class="product">
                    <div class="product-img">
                        <img src="<?=$product->image;?>" alt="">
                    </div>
                    <div class="product-info">
                        <div class="description"><?=$product->description;?></div>
                        <div class="title"><?=$product->title;?></div>
                        <?php if($product->productLinks):?>
                        <div class="buy">
                            <a href="#" target="_blank" <?=$product->ga_param ? 'data-event="click" data-param="'.$product->ga_param.'"' : '';?>>Купить</a>
                            <div class="links">
                                <?php foreach ($product->productLinks as $link):?>
                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>><?=$link->title;?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
                <?php foreach ($products as $product):?>
                <div class="product">
                    <div class="product-img">
                        <img src="<?=$product->image;?>" alt="">
                    </div>
                    <div class="product-info">
                        <div class="description"><?=$product->description;?></div>
                        <div class="title"><?=$product->title;?></div>
                        <?php if($product->productLinks):?>
                        <div class="buy">
                            <a href="#" target="_blank" <?=$product->ga_param ? 'data-event="click" data-param="'.$product->ga_param.'"' : '';?>>Купить</a>
                            <div class="links">
                                <?php foreach ($product->productLinks as $link):?>
                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>><?=$link->title;?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="screen-3" id="screen-3">
    <div class="s3__zasvet">&nbsp;</div>
    <div class="s3__zasvet2">&nbsp;</div>
    <div class="container s3__container">
        <div class="strobing-maning">
            <div class="sm sm-1">
                <div class="sm1-title">Стробинг<br>или майнинг?</div>
                <div class="sm1-subtitle">кто ты в мире мейкаперов</div>
                <div class="sm1-img-mob"><img src="/images/s3__sm-a7c4007519.png" alt=""></div>
                <div class="sm1-body">Можно ли назвать тебя гуру макияжа и специалистом в области <br>современных косметических средств, или твоя женская суперсила <br>вовсе не в мэйкапе? Стоит ли подругам доверять твоим <br>рекомендациям? Давай узнаем!</div>
                <div class="go-test">
                    <a href="<?=Url::toRoute(['site/test']);?>" class="test-link" data-event="click" data-param="start-test">Пройти тест</a>
                </div>
            </div>
            <div class="sm sm-2">
                <img src="/images/s3__sm-a7c4007519.png" alt="">
            </div>
        </div>
        <div class="video">
            <div class="v__title">Смотри видео-уроки мейкапа от</div>
            <div class="v__lp">
                <a href="#"><img src="/images/s3__v__lp-502e83f397.svg" alt=""></a>
            </div>
            <div class="v__img">
                <img src="<?=$video->imageUrl;?>" alt="">
                <a class="y-video play-btn" href="http://www.youtube-nocookie.com/embed/<?=$video->key;?>?rel=0&amp;iframe=true"><img src="/images/s3__v__play-2d59db206b.png" alt=""></a>
            </div>
            <div class="see-all">
                <a href="<?=Url::toRoute(['site/videos']);?>">Смотреть все</a>
            </div>
        </div>
    </div>
</div>

<?php

$script = "
    var qParseJson = '".json_encode($questions)."';

    var pointParseJson = '".json_encode($scores)."';

    var finalParseJson = '".json_encode($results)."';
    
    var resParseJson = '".json_encode($comments)."';
    
";

$this->registerJs($script, yii\web\View::POS_HEAD);

$script = "
    function updateShare(res) {   
        $.ajax({
            data: {res: res},
            success: function(data) {
                if(data) {
                    $('.share').attr('data-url', data.uri);
                    $('.share').attr('data-title', data.title);
                    $('.share').attr('data-image', data.image);
                    $('.share').attr('data-text', data.description);

                    $('meta[property=\"og:url\"]').attr('content', data.uri);
                    $('meta[property=\"og:title\"]').attr('content', data.title);
                    $('meta[property=\"og:image\"]').attr('content', data.image);
                    $('meta[property=\"og:description\"]').attr('content', data.text);
                }
            }
        });

        window.history.pushState(null, '', '/?res='+res);
    }
";

$this->registerJs($script, yii\web\View::POS_END);
?>