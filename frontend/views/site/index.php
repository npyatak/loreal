<?php
use yii\helpers\Url;

$this->params['bodyClass'] = 'page-front';
?>

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
                    <a href="#">Вдохновись и<br>Покажи, на что<br>ты способен!<br>старт 8 марта</a>
                </div>
                <div class="tc1-block2">
                    <a href="<?=Url::toRoute(['site/video', '#' => 'tutorial']);?>">Тьюториалы</a>
                </div>
                <!-- <div class="tc1-block3">
                    <a href="<?=Url::toRoute(['site/video', '#' => 'backstage']);?>">смотреть бекстейджи</a>
                </div> -->
            </div>
            <div class="s1__tc-2">
                <div class="tc2-block1">
                    <a href="#">Стробинг или<br>майнинг?</a>
                </div>
                <div class="tc2-block2">
                    <a href="#">Кто ты в мире<br>мейкапа</a>
                </div>
                <div class="go-test">
                    <a href="#screen-3" class="anchor-link">Пройти тест</a>
                </div>
            </div>
        </div>
    </div>
</div>
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
                            <a href="#" target="_blank">Купить +</a>
                            <div class="links">
                                <?php foreach ($product->productLinks as $link):?>
                                    <a href="<?=$link->url;?>" target="_blank"><?=$link->title;?></a>
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
                <div class="sm1-img-mob"><img src="/images/s3__sm.png" alt=""></div>
                <div class="sm1-body">Можно ли назвать тебя гуру макияжа и специалистом в области<br>современных косметических средств, или твоя женская суперсила<br>вовсе не в мэйкапе? Стоит ли подругам доверять твоим<br>рекомендациям? Давай узнаем!</div>
                <div class="go-test">
                    <a href="<?=Url::toRoute(['site/test']);?>" class="test-link">Пройти тест</a>
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
                <a href="<?=Url::toRoute(['site/video']);?>">Смотреть все</a>
            </div>
        </div>
    </div>
</div>

<?php
$script = "
    var qParseJson = '".json_encode($questions)."';

    var resParseJson = '".json_encode($comments)."';

    var pointParseJson = '".json_encode($scores)."';

    var finalParseJson = '".json_encode($results)."';
";

$this->registerJs($script, yii\web\View::POS_HEAD);

$script = "
    function updateShare(result) {
        var url = '".Url::toRoute(['site/index'], true)."?res='+result.id;
        $('.share').attr('data-url', url);
        $('.share').attr('data-title', result.title);
        $('.share').attr('data-image', result.image);
        $('.share').attr('data-text', result.description);

        $('meta[property=\"og:url\"]').attr('content', url);
        $('meta[property=\"og:title\"]').attr('content', result.title);
        $('meta[property=\"og:image\"]').attr('content', result.image);
        $('meta[property=\"og:description\"]').attr('content', result.description);

        window.history.pushState(null, '', url);
    }
";

$this->registerJs($script, yii\web\View::POS_END);
?>