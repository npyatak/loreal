<?php foreach ($posts as $post):?>
	<img src="<?=$post->imageUrl;?>">
	<?=$this->render('_like_button', ['post' => $post]);?>
	<span><?=$post->score;?></span>
<?php endforeach;?>