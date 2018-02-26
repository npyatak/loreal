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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="<?=$this->params['bodyClass'];?>">
<?php $this->beginBody() ?>

    <div id="page-wrapper">
        <div id="all-wrapper">
            <header id="header">
                <div class="container h__container">
                    <div class="h__friday">
                        <a href="#"><img src="/images/h__friday-322f38062c.png" alt=""></a>
                    </div>
                    <div class="h__burger">&nbsp;</div>
                    <div class="h__lp">
                        <a href="#"><img src="/images/h__lp-66abe048e1.svg" alt=""></a>
                    </div>
                </div>

                <ul id="main-menu">
                    <li><a href="<?=Url::home();?>">На главную</a></li>
                    <li><a href="#">Кто ты в мире мейкаперов? Узнать</a></li>
                    <li><a href="<?=Url::toRoute(['site/video', '#' => 'tutorial']);?>">Смотреть тьюториалы</a></li>
                    <li><a href="<?=Url::toRoute(['site/video', '#' => 'backstage']);?>">Смотреть бекстейджи</a></li>
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
                    <div class="copyright">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></div>
                </div>
            </footer>
        </div>

        <?php if(Yii::$app->controller->action->id == 'index'):?>
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
                    <div class="r__banner">
                        <img src="/images/r__banner-03792c0888.jpg" alt="">
                    </div>
                    <div class="r__status-title"></div>
                    <div class="r__status-desc">
                    </div>
                    <div class="r__lessons">
                        <a href="#">смотри наши уроки от L’ORÉAL PARIS</a>
                    </div>
                    <div class="r__share-title">Поделиться</div>
                    <div class="share-icon">
                        <?=\frontend\widgets\share\ShareWidget::widget(['share' => $this->params['share']]);?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </div>

    <div id="overlay">&nbsp;</div>
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