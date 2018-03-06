<?php foreach ($posts as $post):?>
	<div class="grid-item" data-id="<?=$post->id;?>">
		<img src="<?=$post->imageUrl;?>">
		<?=$this->render('_like_button', ['post' => $post]);?>
		<span><?=$post->score;?></span>
	</div>
<?php endforeach;?>