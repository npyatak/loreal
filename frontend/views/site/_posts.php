<?php foreach ($posts as $key => $post):?>
    <div class="view-row view-row-<?=$key;?>" data-id="<?=$post->id;?>">
        <div class="field-points-label score"><?=$post->score;?></div>
        <div class="field-image">
            <img src="<?=$post->imageUrl;?>" alt="">
        </div>
        <?php if($post->user->name):?>
        <div class="field-name">
            <?=$post->user->fullName;?>
        </div>
        <?php endif;?>
        <div class="field-points">
            Баллы: <span class="score"><?=$post->score;?></span>
        </div>
        <?php if($post->type):?>
        <div class="field-shape">
            <?=$post->typeLabel;?>
        </div>
        <?php endif;?>

        <div class="field-vote">
			<?=$this->render('_like_button', ['post' => $post]);?>
        </div>
    </div>
<?php endforeach;?>