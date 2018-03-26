<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Авторизуйся, используя свой акаунт:';
?>

<div class="site-login__first text-center">
    <h2 class="title-lg"><?= Html::encode($this->title) ?></h2>
    <?php echo \frontend\widgets\social\SocialWidget::widget(['action' => 'site/login']); ?>
    <!--<p>Авторизуйся, используя один из аккаунтов соц.сетей</p>-->
</div>
<div class="site-login__second text-center">
    <span class="alert"></span>
    <form action="">
        <div class="form-group">
            <div class="left">
                <input id="rules" type="checkbox" checked="checked" class="form-control">
                <label for="rules" class="form-label checked"></label>
            </div>
            <div class="right">
                <p>Авторизуясь, я согласен с <a href="<?=Url::to(['site/rules']);?>">полными правилами</a></p>
            </div>
        </div>
    </form>
</div>