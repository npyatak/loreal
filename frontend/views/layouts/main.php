<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-114928625-1', 'auto');
        ga('send', 'pageview');
    </script>
    <?php //if($_SERVER['HTTP_HOST'] !== 'loreal.local'):?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114928625-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-114928625-1');
        </script>
    <?php //endif;?>
</head>
<body class="<?=isset($this->params['bodyClass']) ? $this->params['bodyClass'] : '';?>">
<?php $this->beginBody() ?>
    <img src="https://4233289.fls.doubleclick.net/activityi;src=4233289;type=main;cat=ru_oa00a;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;ord=1?" style="display:block;width:0;height:0;position:absolute;visibility:hidden;" alt="">
    <img src="http://ads.adfox.ru/240113/getCode?p1=bztph&p2=frfe&pfc=bruwy&pfb=ficvq&pr=%random%&ptrc=b" alt="" style="display:block;">
    
    <div id="page-wrapper">
        <div id="all-wrapper">
            <header id="header">
                <div class="container h__container">
                    <div class="h__friday">
                        <a href="https://friday.ru/" target="_blank" data-event="click" data-param="friday-logo"><img src="/images/h__friday-322f38062c.png" alt=""></a>
                    </div>
                    <div class="h__burger">&nbsp;</div>
                    <div class="h__lp">
                        <a href="http://ads.adfox.ru/240113/goLink?p1=bztph&p2=frfe&p5=ficvq&pr=%random%" target="_blank" data-event="click" data-param="loreal-logo"><img src="/images/h__lp-66abe048e1.svg" alt=""></a>
                    </div>
                </div>

                <ul id="main-menu">
                    <li><a href="<?=Url::home();?>">На главную</a></li>
                    <li><a href="<?=Url::toRoute(['site/index', '#' => 'screen-3']);?>">Кто ты в мире мейкаперов? Узнать</a></li>
                    <li><a href="<?=Url::toRoute(['site/videos', '#' => 'tutorial']);?>">Смотреть тьюториалы</a></li>
                    <!-- <li><a href="<?=Url::toRoute(['site/videos', '#' => 'backstage']);?>">Смотреть бекстейджи</a></li> -->
                    <li><a href="https://makeupers.friday.ru/" target="_blank">Смотри шоу МЕЙКАПЕРЫ на Пятнице!</a></li>
                </ul>
            </header>

            <div id="main">
                <div id="content">
                    <?=$content;?>
                </div>
            </div>

            <footer id="footer">
                <div class="container f__container">
                    <div class="copyright">&copy; friday.ru 2018, 18+</div>
                </div>
            </footer>       

            <div id="buy-popup">
                <div class="bp__close"><img src="/images/test__close-010fb6bdbf.png" alt=""></div>
                <div class="bp__content">
                    <div class="bp__title">Купить у наших<br/> партнеров</div>
                    <div class="bp__links"></div>
                </div>
            </div>

            <div id="overlay-buypopup" class="overlay">&nbsp;</div>

            <div id="test">
                <div class="test__close">
                    <img src="/images/test__close-010fb6bdbf.png" alt="">
                </div>
                <div class="test__content">
                    <div class="question-template">
                        <div class="qt__title">Стробинг<br>или майнинг?</div>
                        <div class="qt__subtitle">кто ты в мире мейкаперов</div>
                        <div class="qt__qnumber"></div>
                        <div class="qt__q"></div>
                        <div class="qt__qimg"></div>
                        <div class="qt__variant-answers">
                        </div>
                    </div>
                    <!-- question-template -->
                    <div class="next-template">
                        <div class="n__title">Стробинг<br>или майнинг?</div>
                        <div class="n__subtitle">кто ты в мире мейкаперов</div>
                        <div class="n__qnumber"></div>
                        <div class="n__res1"></div>
                        <div class="n__qbtn"><span></span></div>
                    </div>
                    <!-- next-template -->
                    <div class="result-template">
                        <div class="r__banner"></div>
                        <div class="r__status-title"></div>
                        <div class="r__status-desc">
                        </div>
                        <div class="r__lessons">
                            <a href="<?=Url::toRoute(['site/videos']);?>" data-event="click" data-param="test-tutorials">смотри наши уроки от L’ORÉAL PARIS</a>
                        </div>
                        <div class="r__share-title">Поделиться</div>
                        <div class="share-icon">
                            <?=\frontend\widgets\share\ShareWidget::widget(['share' => $this->params['share']]);?>
                        </div>
                        <div class="r__banner-bottom"></div>
                    </div>
                </div>
            </div>
            
            <div id="overlay" class="overlay">&nbsp;</div>

            <?php if(Yii::$app->user->isGuest):?>
            <div id="login-popup">
                <div class="bp__close"><img src="/images/test__close-010fb6bdbf.png" alt=""></div>
                <div class="bp__content">
                    <?=$this->render('../site/_login');?>
                </div>
            </div>
            <?php endif;?>

            <div id="overlay-loginpopup" class="overlay">&nbsp;</div>

        </div>

    </div>

    <div id="preloader">
        <div class="pl__wrapper">
            <div class="pl__dots">
                <div class="pl__dot pl__dot-1"></div>
                <div class="pl__dot pl__dot-2"></div>
                <div class="pl__dot pl__dot-3"></div>
            </div>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>