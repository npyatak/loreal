<?php 
use yii\helpers\Url;

$this->params['bodyClass'] = 'page-video page-new-video';
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

<div class="video-screen">
	<div class="video_bg-top">&nbsp;</div>
	<div class="video_bgr-test">&nbsp;</div>
	<div class="video_bulbs">&nbsp;</div>
	<div class="video_glow-red">&nbsp;</div>
	<div class="container vs__container">
		<div class="vs__makeup">
			<a href="https://makeupers.friday.ru/" target="_blank"><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
		</div>
		<div class="vs__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
		<div class="vs__subtitle">#lorealparis_мейкаперы</div>
		<div class="vs__intro">Вдохновляйся и Покажи, на что <br>ты способен!</div>
		<div class="video-gallery video-gallery-1 no-youtube" id="tutorial">
			<div class="vg__title vg1__title">8-21 марта: как с картинки</div>
			<div class="vg__union vg1__union">
				<?php if(isset($videosTop[0])):?>
				<div class="vg__big-video vg1__big-video" vg="prod-1">
					<div class="close">X</div>
					<!--<img src="<?//=$videosTop[0]->imageUrl;?>" alt="">-->
					<img src="/images/video/preview_1.jpg" alt="">
					<a class="play-btn" href="superwoman_on_5.mp4"><img src="/images/s3__v__play-2d59db206b.png" alt=""></a>
					<video id="video-main">
					    <source src="/video/superwoman_on_5.mp4" type="video/mp4">
					    Your browser does not support the video tag.
					</video>
				</div>
				<?php endif;?>
				<div class="vg__thumbnail-union vg1__thumbnail-union">
					<div class="vg__thumbnails vg1__thumbnails">
					<?php foreach ($videosTop as $key => $video):?>
						<?php if($key != 0):?>
							<div class="vg__thumbnail vg__thumbnail-1" video-id="<?=$video->key;?>">
								<img src="<?=$video->imageUrl;?>" alt="">
							</div>
						<?php endif;?>
					<?php endforeach;?>
					<div class="vg__thumbnail vg__thumbnail-1" video-id="superwoman_on_5.mp4" vg="prod-1">
						<img src="/images/video/preview_1.jpg" alt="">
					</div>
					<div class="vg__thumbnail vg__thumbnail-2" video-id="hell.mp4" vg="prod-2">
						<img src="/images/video/preview_2.jpg" alt="">
					</div>

					</div>
				</div>
			</div>
		</div>
		
		<div class="screen-2">
			<div class="s2__title">Брось вызов вместе с</div>
			<div class="s2__lp">
			    <a href=""><img src="/images/s2__lp-eb2ed34ae8.svg" alt=""></a>
			</div>

			<div class="product-union scroll-pane horizontal-only" vg="prod-1">
			    <?php if($productsTop):?>
		            <div class="products">
		                <?php foreach ($productsTop as $product):?>
		                <div class="product">
		                    <div class="product-img">
		                        <img src="<?=$product->image;?>" alt="">
		                    </div>
		                    <div class="product-info">
		                        <div class="description"><?=$product->description;?></div>
		                        <div class="title"><?=$product->title;?></div>
		                        <?php if($product->productLinks):?>
		                        <div class="buy">
		                            <a href="#" target="_blank" <?=$product->ga_param ? 'data-event="click" data-param="'.$product->ga_param.'"' : '';?>>Купить</a>
		                            <div class="links">
		                                <?php foreach ($product->productLinks as $link):?>
		                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>><?=$link->title;?></a>
		                                <?php endforeach;?>
		                            </div>
		                        </div>
		                        <?php endif;?>
		                    </div>
		                </div>
		                <?php endforeach;?>
		            </div>
	            <?php endif;?>
			</div>

			<div class="product-union scroll-pane horizontal-only" vg="prod-2">
			    <?php if($productsBottom):?>
		            <div class="products">
		                <?php foreach ($productsBottom as $product):?>
		                <div class="product">
		                    <div class="product-img">
		                        <img src="<?=$product->image;?>" alt="">
		                    </div>
		                    <div class="product-info">
		                        <div class="description"><?=$product->description;?></div>
		                        <div class="title"><?=$product->title;?></div>
		                        <?php if($product->productLinks):?>
		                        <div class="buy">
		                            <a href="#" target="_blank" <?=$product->ga_param ? 'data-event="click" data-param="'.$product->ga_param.'"' : '';?>>Купить</a>
		                            <div class="links">
		                                <?php foreach ($product->productLinks as $link):?>
		                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>><?=$link->title;?></a>
		                                <?php endforeach;?>
		                            </div>
		                        </div>
		                        <?php endif;?>
		                    </div>
		                </div>
		                <?php endforeach;?>
		            </div>
	            <?php endif;?>
			</div>
		</div>
		
		<div class="screen-3">
			<div class="video">
			    <div class="v__title">Смотри видео-уроки мейкапа от</div>
			    <div class="v__lp">
			        <a href="#"><img src="/images/s3__v__lp-502e83f397.svg" alt=""></a>
			    </div>
			    <div class="v__img">
			        <img src="<?=$video->imageUrl;?>" alt="">
			        <a class="y-video play-btn" href="http://www.youtube-nocookie.com/embed/<?=$video->key;?>?rel=0&amp;iframe=true"><img src="/images/s3__v__play-2d59db206b.png" alt=""></a>
			    </div>

			    <div class="after-video">
			        <div class="av__title">Курс молодого мейкапера - День Святого Валентина</div>
			        <div class="av__body">Смотри мастер-класс от официального визажиста L'Oréal Paris в России Милы Клименко и узнай, как создать чувственный макияж с акцентом на губы к Дню святого Валентина. Хочешь узнать больше мейкап-лайфхаков? Не пропусти шоу «Мейкаперы»!</div>
			    </div>

			</div>
		</div>

		<div class="strobing-maning">
			<div class="sm sm-1">
				<div class="sm1-title">Стробинг<br>или майнинг?</div>
				<div class="sm1-subtitle">кто ты в мире мейкаперов</div>
				<div class="sm1-img-mob"><img src="/images/s3__sm-a7c4007519.png" alt=""></div>
				<div class="sm1-body">Можно ли назвать тебя гуру макияжа и специалистом в области <br>современных косметических средств, или твоя женская суперсила <br>вовсе не в мэйкапе? Стоит ли подругам доверять твоим <br>рекомендациям? Давай узнаем!</div>
				<div class="go-test">
					<a href="<?=Url::toRoute(['site/index', '#' => 'screen-3']);?>" class="test-link">Пройти тест</a>
				</div>
			</div>
			<div class="sm sm-2">
				<img src="/images/s3__sm-a7c4007519.png" alt="">
			</div>
		</div>
	</div>
</div>

<div class="screen-2">
    <div class="s2__zasvet">&nbsp;</div>
    <div class="container s2__container">
        <div class="s2__title">Брось вызов вместе с</div>
        <div class="s2__lp">
            <a href=""><img src="/images/s2__lp-eb2ed34ae8.svg" alt=""></a>
        </div>
        <div class="product-union scroll-pane horizontal-only">
            <?php if($productsTop):?>
            <div class="products">
                <?php foreach ($productsTop as $product):?>
                <div class="product">
                    <div class="product-img">
                        <img src="<?=$product->image;?>" alt="">
                    </div>
                    <div class="product-info">
                        <div class="description"><?=$product->description;?></div>
                        <div class="title"><?=$product->title;?></div>
                        <?php if($product->productLinks):?>
                        <div class="buy">
                            <a href="#" target="_blank" <?=$product->ga_param ? 'data-event="click" data-param="'.$product->ga_param.'"' : '';?>>Купить</a>
                            <div class="links">
                                <?php foreach ($product->productLinks as $link):?>
                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>><?=$link->title;?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>

<div class="screen-2">
    <div class="s2__zasvet">&nbsp;</div>
    <div class="container s2__container">
        <div class="s2__title">Брось вызов вместе с</div>
        <div class="s2__lp">
            <a href=""><img src="/images/s2__lp-eb2ed34ae8.svg" alt=""></a>
        </div>
        <div class="product-union scroll-pane horizontal-only">
            <?php if($productsBottom):?>
            <div class="products">
                <?php foreach ($productsBottom as $product):?>
                <div class="product">
                    <div class="product-img">
                        <img src="<?=$product->image;?>" alt="">
                    </div>
                    <div class="product-info">
                        <div class="description"><?=$product->description;?></div>
                        <div class="title"><?=$product->title;?></div>
                        <?php if($product->productLinks):?>
                        <div class="buy">
                            <a href="#" target="_blank" <?=$product->ga_param ? 'data-event="click" data-param="'.$product->ga_param.'"' : '';?>>Купить</a>
                            <div class="links">
                                <?php foreach ($product->productLinks as $link):?>
                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>><?=$link->title;?></a>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>