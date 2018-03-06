<?php
use yii\helpers\Html;

$this->title = 'Полные правила';
$this->params['bodyClass'] = 'rules';
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

<div class="rules-region">
	<div class="container rr__container">

		<div class="rr__makeup">
		    <a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
		</div>
		<div class="rr__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
		<div class="rr__subtitle">#lorealparis_мейкаперы</div>
		<div class="rr__intro">Вдохновляйся и Покажи, на что <br>ты способен!</div>

		<h1 class="rules-title"><?= Html::encode($this->title) ?></h1>
		
	</div>
</div>