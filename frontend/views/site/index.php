ри<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
use kop\y2sp\ScrollPager;
use yii\widgets\Pjax;

$this->registerJsFile(Url::toRoute('js/test.js'), ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->params['bodyClass'] = 'page-front page-new-front';
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
                    <a href="<?=Url::toRoute(['site/videos', '#' => 'tutorial']);?>">Участвовать</a>
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
                        ВЫПОЛНЯЙ ЗАДАНИЕ <br/> 
                        И РАЗМЕЩАЙ ФОТО В <i class="vk">&nbsp;</i> И <i class="insta">&nbsp;</i> <br/>
                        ПОД #LOREALPARIS_МЕЙКАПЕРЫ<br/>
                        ИЛИ <a href="<?=Url::toRoute(['site/participate']);?>">ЗАГРУЖАЙ НА САЙТ</a>
                    </div>
                </div>
                <div class="step step-3">
                    <div class="s-number">3</div>
                    <div class="s-body">
                        Зови друзей голосовать на сайт и выиграй призы. Главный приз всех этапов - мастер-класс с Милой Клименко.
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<div class="stage">
    <div class="container st__container">
        <?php if($week):?>
            <div class="st__title">Этап <?=$week->number;?></div>
            <div class="st__subtitle"><?=$week->startDate;?> - <?=$week->endDate;?></div>

            <div class="st__extra-price">Выиграй приз от L’Oreal Paris  – годовой набор косметики.</div>
            <div class="st__full-reg"><a href="<?=Url::toRoute(['site/rules']);?>" class="popup-rules">Полные правила</a></div>

            <div class="st__blocks">
                <a class="st__block st__block-1" href="<?=Url::toRoute(['site/videos', 'type'=>1]);?>">
                    <div class="stb-img" style="background-image: url('<?=$week->preview_main_1;?>');"><img src="<?=$week->preview_main_1;?>" alt=""></div>
                    <div class="stb-play"><img src="/images/new-index/st__play.png" alt=""></div>
                    <div class="stb-tit-wrap">
                        <div class="stb-title">С <?=$week->startDate;?> по <?=$week->endDate;?></div>
                        <div class="stb-subtitle"><?=$week->description_1;?></div>
                    </div>
                </a>
                <a class="st__block st__block-2" href="<?=Url::toRoute(['site/videos', 'type'=>2]);?>">
                    <div class="stb-img" style="background-image: url('<?=$week->preview_main_2;?>');"><img src="<?=$week->preview_main_2;?>" alt=""></div>
                    <div class="stb-play"><img src="/images/new-index/st__play.png" alt=""></div>
                    <div class="stb-tit-wrap">
                        <div class="stb-title">С <?=$week->startDate;?> по <?=$week->endDate;?></div>
                        <div class="stb-subtitle"><?=$week->description_2;?></div>
                    </div>
                </a>
            </div>
        <?php endif;?>

        <div class="st__see-all-tutor">
            <a href="<?=Url::toRoute(['site/videos']);?>">Смотри все тьюториалы от L'Oréal Paris</a>
        </div>

    </div>
</div>

<div class="screen-2">
    <div class="s2__zasvet">&nbsp;</div>
    <div class="container s2__container">
        <div class="s2__title">Брось вызов вместе с</div>
        <div class="s2__lp">
            <a href="http://ads.adfox.ru/240113/goLink?p1=bztph&p2=frfe&p5=ficvq&pr=%random%" target="_blank"><img src="/images/s2__lp-eb2ed34ae8.svg" alt=""></a>
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
                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>>
                                        <?=$link->logo ? Html::img($link->logo) : $link->title;?>
                                    </a>
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

        <div class="gallery-his-turn">
            
            <div class="ght__title">Эти мейкаперы уже сделали свой ход</div>
            <div class="ght__subtitle">Поддержи их своим голосом</div>
            
            <?php if(!empty($winnersPosts)):?>
                <?php $number = 1;
                foreach ($winnersPosts as $key => $ps):?>
                    <div class="wfs-title">Победители <?=$number;?>-го этапа</div>

                    <div class="view view-voting view-wfs">
                        <div class="view-content">
                            <?php foreach ($ps as $i => $p):?>
                                <?php $i++;?>
                                <div class="view-row" data-key="">
                                    <div class="field-image">
                                        <img src="<?=$p->imageUrl;?>" alt="">
                                    </div>
                                    <div class="field-name"><?=$p->user->fullName;?></div>
                                    <div class="field-points">
                                        Победитель этапа <?=$number;?>
                                    </div>
                                    <?php $attr = 'description_'.$p->type;?>
                                    <div class="field-shape"><?=$completedWeekIds[$p->week_id]->$attr;?></div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <?php $number++;?>
                <?php endforeach;?>
            <?php endif;?>

            <?php Pjax::begin(); ?> 
            <div class="view view-voting">
                <div class="view-filter">
                    <div class="sorting">
                        <div class="date sort-param <?=in_array($sort, ['-created_at', 'created_at']) ? 'active' : '';?>">
                            <a href="<?=Url::current(['sort' => $sort == '-created_at' ? 'created_at' : '-created_at']);?>">По дате</a>
                        </div>
                        <div class="point sort-param <?=in_array($sort, ['score', '-score']) ? 'active' : '';?>">
                            <a href="<?=Url::current(['sort' => $sort == '-score' ? 'score' : '-score']);?>">По баллам</a>
                        </div>
                    </div>

                    <div class="upload-file">
                        <a href="<?=Url::toRoute(['site/participate']);?>" class="link">Загрузи свое фото на проект +</a>
                    </div>
                </div>

                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => "{items} {pager}",
                    'itemOptions' => ['class' => 'view-row'],
                    'itemView' => '_post',
                    'options' => ['class' => 'view-content', 'id' => 'posts'],
                    'pager' => [
                        'class' => ScrollPager::className(), 
                        'triggerText' => 'Загрузить ещё',
                        'triggerTemplate' => '<div class="ias-trigger"><a class="link">{text}</a></div>',
                        'container' => '#posts',
                        'item' => '.view-row',
                        'negativeMargin' => 1000,
                        'delay' => 10,
                        'paginationSelector' => '#posts .pagination',
                        'enabledExtensions' => [
                            ScrollPager::EXTENSION_TRIGGER,
                        ]
                    ],
                ]);?>
            </div>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?php if($activePost):?>
    <div id="info-popup" class="popup active gallery-his-turn">
        <div class="bp__close"><img src="/images/test__close-010fb6bdbf.png" alt=""></div>
        <div class="bp__content view-voting">
            <div class="view-content">
                <div class="view-row" data-key="<?=$activePost->id;?>">
                    <div class="field-points-label score"><?=$activePost->score;?></div>
                    <div class="field-image">
                        <img src="<?=$activePost->imageUrl;?>" alt="">
                    </div>
                    <?php if($activePost->user->name):?>
                    <div class="field-name">
                        <?=$activePost->user->fullName;?>
                    </div>
                    <?php endif;?>
                    <div class="field-points">
                        Баллы: <span class="score"><?=$activePost->score;?></span>
                    </div>
                    <?php if($activePost->type):?>
                    <div class="field-shape">
                        <?=$activePost->typeLabel;?>
                    </div>
                    <?php endif;?>

                    <div class="field-vote">
                        <?=$this->render('_like_button', ['model' => $activePost]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlay-loginpopup" class="overlay">&nbsp;</div>
<?php endif;?>

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
    
    $(document).on('pjax:beforeReplace', function() {
        $.ias().destroy();
    });

    $(document).on('pjax:end', function() {
        $.ias().reinitialize();
    });
";

$this->registerJs($script, yii\web\View::POS_END);
?>