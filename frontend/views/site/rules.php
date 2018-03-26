<?php
use yii\helpers\Html;

$this->title = 'Полные правила';
$this->params['bodyClass'] = 'rules';
?>

<div class="rules-region">
	<div class="container rr__container">

		<div class="rr__makeup">
		    <a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
		</div>
		<div class="rr__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
		<div class="rr__subtitle">#lorealparis_мейкаперы</div>
		<div class="rr__intro">Вдохновляйся и Покажи, на что <br>ты способен!</div>

		<h1 class="rules-title"><?= Html::encode($this->title) ?></h1>
		
		<div class="rules-block">
			<?=$this->params['rulesText'];?>
		</div>

	</div>
</div>