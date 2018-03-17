<?php 
use yii\helpers\Url;
use yii\helpers\Html;

$this->params['bodyClass'] = 'page-video page-new-video';
$this->title = 'Тьюториалы';

$typeArr = [
	1 => ['title' => '8-21 МАРТА: МЭЙКАП В СТИЛЕ КОМИКСОВ', 'video' => 'comic_30mb.mp4', 'preview' => '/images/video/preview_2.jpg'],
	2 => ['title' => '8-21 МАРТА: МЕЙКАП НА ХЕЛЛУИН', 'video' => 'halloween_30mb.mp4', 'preview' => '/images/video/preview_1.jpg'],
];
?>

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

		<div class="step-region">

	        <div class="steps">
	            <div class="step step-1">
	                <div class="s-number">1</div>
	                <div class="s-body">
	                    Смотри тьюториалы
	                </div>
	            </div>
	            <div class="step step-2">
	                <div class="s-number">2</div>
	                <div class="s-body">
	                    ВЫПОЛНЯЙ ЗАДАНИЕ <br/> 
                        И РАЗМЕЩАЙ ФОТО В <i class="vk">&nbsp;</i> И <i class="insta">&nbsp;</i> <br/>
                        ПОД #LOREALPARIS_МЕЙКАПЕРЫ<br/>
                        ИЛИ <a href="<?=Url::toRoute(['site/participate']);?>">ЗАГРУЖАЙ НА САЙТ</a>
	                </div>
	            </div>
	            <div class="step step-3">
	                <div class="s-number">3</div>
	                <div class="s-body">
	                    ЗОВИ ДРУЗЕЙ ГОЛОСОВАТЬ НА САЙТ И ПОЛУЧАЙ ПРИЗЫ ОТ L'ORÉAL PARIS
	                </div>
	            </div>
	        </div>

		</div>

		<div class="video-gallery video-gallery-1 no-youtube" id="tutorial">
			<div class="vg__title vg1__title"><?=$typeArr[$type]['title'];?></div>
			<div class="vg__union vg1__union">
				<div class="vg__big-video vg1__big-video" video-id="<?=$typeArr[$type]['video'];?>" vg="prod-<?=$type;?>">
					<div class="close">X</div>
					<img src="<?=$typeArr[$type]['preview'];?>" alt="">
					<a class="play-btn" href="<?=$typeArr[$type]['video'];?>"><img src="/images/s3__v__play-2d59db206b.png" alt=""></a>
					<video id="video-main" controls>
					    <source src="/video/<?=$typeArr[$type]['video'];?>" type="video/mp4">
					    Your browser does not support the video tag.
					</video>
				</div>
				<div class="vg__thumbnail-union vg1__thumbnail-union">
					<div class="vg__thumbnails vg1__thumbnails">
						<?php foreach ($typeArr as $key => $t):?>
							<div class="vg__thumbnail vg__thumbnail-1" video-id="<?=$t['video'];?>" vg="prod-<?=$key;?>" data-title="<?=$t['title'];?>">
								<img src="<?=$t['preview'];?>" alt="">
							</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>

		<div class="full-rules">
			<a href="<?=Url::toRoute(['site/rules']);?>" class="popup-rules">Полные правила</a>
		</div>

		<div class="go-participate">
            <a href="/videos#tutorial">Участвовать</a>
        </div>
		
		<div class="screen-2">
			<div class="s2__title">Брось вызов вместе с</div>
			<div class="s2__lp">
			    <a href="http://ads.adfox.ru/240113/goLink?p1=bztph&p2=frfe&p5=ficvq&pr=%random%" target="_blank"><img src="/images/s2__lp-eb2ed34ae8.svg" alt=""></a>
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
		                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>>
		                                    	<?=$link->logo ? Html::img($link->logo) : $link->title;?>
		                                    </a>
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
		                                    <a href="<?=$link->url;?>" target="_blank" <?=$link->ga_param ? 'data-event="click" data-param="'.$link->ga_param.'"' : '';?>>
		                                    	<?=$link->logo ? Html::img($link->logo) : $link->title;?>
		                                    </a>
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

				<?php if(isset($videosBottom[0])):?>
			    <div class="after-video">
			        <div class="av__title"><?=$videosBottom[0]->title;?></div>
			        <div class="av__body"><?=$videosBottom[0]->text;?></div>
			    </div>

				<div class="video-gallery youtube video-gallery-2" id="videosBottom">
					<div class="vg__union vg1__union">
						<div class="vg__big-video vg1__big-video" video-id="<?=$videosBottom[0]->key;?>">
							<div class="close">X</div>
							<img src="<?=$videosBottom[0]->imageUrl;?>" alt="">
							<a class="play-btn" href="<?=$videosBottom[0]->key;?>"><img src="<?=$videosBottom[0]->imageUrl;?>" alt=""></a>
							<video id="video-main" controls>
							    <source src="http://www.youtube-nocookie.com/embed/<?=$videosBottom[0]->key;?>?rel=0&amp;iframe=true" type="video/mp4">
							    Your browser does not support the video tag.
							</video>
						</div>
						<div class="vg__thumbnail-union vg2__thumbnail-union">
							<div class="vg__thumbnails vg2__thumbnails">
							<?php foreach ($videosBottom as $key => $video):?>
								<div style="<?=$key == 0 ? 'display: none;' : '';?>" class="vg__thumbnail vg__thumbnail-2" video-id="<?=$video->key;?>" data-title="<?=$video->title;?>" data-text="<?=$video->text;?>">
									<img src="<?=$video->imageUrl;?>" alt="">
								</div>
							<?php endforeach;?>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>


		<div class="strobing-maning">
			<div class="sm sm-1">
				<div class="sm1-title">Стробинг<br>или майнинг?</div>
				<div class="sm1-subtitle">кто ты в мире мейкаперов</div>
				<div class="sm1-img-mob"><img src="/images/s3__sm-a7c4007519.png" alt=""></div>
				<div class="sm1-body">Можно ли назвать тебя гуру макияжа и специалистом в области <br>современных косметических средств, или твоя женская суперсила <br>вовсе не в мэйкапе? Стоит ли подругам доверять твоим <br>рекомендациям? Давай узнаем!</div>
				<div class="go-test">
					<a href="<?=Url::toRoute(['site/index', '#' => 'test']);?>" class="test-link">Пройти тест</a>
				</div>
			</div>
			<div class="sm sm-2">
				<img src="/images/s3__sm-a7c4007519.png" alt="">
			</div>
		</div>
	</div>
</div>