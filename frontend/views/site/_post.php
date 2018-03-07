    <div class="field-points-label score"><?=$model->score;?></div>
    <div class="field-image">
        <img src="<?=$model->imageUrl;?>" alt="">
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