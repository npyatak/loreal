<?php
use yii\helpers\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;

$this->params['bodyClass'] = 'page-participate page-login';
?>
<div class="participate-screen">

    <div class="ps__makeup ">
        <a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
    </div>

    <?=$this->render('_login');?>
</div>