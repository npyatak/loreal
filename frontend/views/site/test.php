<?php if(!empty($winnersPosts)):?>
    <?php $number = 1;
    foreach ($winnersPosts as $key => $ps):?>
        <div class="wfs-title">Победители <?=$number;?>-го этапа</div>

        <div class="view view-voting view-wfs">
            <div class="view-content">
                <?php foreach ($ps as $i => $p):?>
                    <?php $i++;?>
                    <div class="view-row" data-key="">
                        <div class="field-image">
                            <img src="<?=$p->imageUrl;?>" alt="">
                        </div>
                        <div class="field-name"><?=$p->user->fullName;?></div>
                        <div class="field-points">
                            Победитель этапа <?=$number;?>
                        </div>
                        <?php $attr = 'description_'.$i;?>
                        <div class="field-shape"><?=$completedWeekIds[$p->week_id]->$attr;?></div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        <?php $number++;?>
    <?php endforeach;?>
<?php endif;?>