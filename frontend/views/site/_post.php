<?php
use yii\helpers\Url;
?>

<div class="field-points-label score"><?=$model->score;?></div>
<div class="field-image">
    <img src="<?=$model->imageUrl;?>" alt="">
</div>
<div class="copy-wrap">
	<a href="<?=Url::toRoute(['site/index', 'id' => $model->id], true);?>" class="copy-link" title="Скопировать ссылку на работу"></a>
	<div class="link-copied">Ссылка скопирована</div>
</div>
<?php if($model->user->name):?>
<div class="field-name">
    <?=$model->user->fullName;?>
</div>
<?php endif;?>
<div class="field-points">
    Баллы: <span class="score"><?=$model->score;?></span>
</div>
<?php if($model->type):?>
<div class="field-shape">
    <?=$model->typeLabel;?>
</div>
<?php endif;?>

<div class="field-vote">
	<?=$this->render('_like_button', ['model' => $model]);?>
</div>