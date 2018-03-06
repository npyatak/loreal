<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\widgets\Alert;

$this->title = 'Обратная связь';
$this->params['breadcrumbs'][] = $this->title;
$this->params['bodyClass'] = 'feedback';
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


<div class="site-contact">
    <div class="container sc__container">
        <div class="sc__makeup">
            <a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
        </div>
        <div class="sc__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
        <div class="sc__subtitle">#lorealparis_мейкаперы</div>
        <div class="sc__intro">Вдохновляйся и Покажи, на что <br>ты способен!</div>

        <h1 class="form-title"><?= Html::encode($this->title) ?></h1>
        <?= Alert::widget() ?>

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            
            <div class="form-wrap">
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-3">{input}</div><div class="col-lg-6 captcha-text">Напишите ответ (цифрами) на наш простой вопрос,<br/> чтобы мы были уверены, что вы не робот!</div></div>',
                ])->label(false) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Отправить сообщение', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>

        <div class="required-fields">
            * Обязательные для заполнения поля
        </div>

    </div>
</div>