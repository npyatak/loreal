<?php 
$this->params['bodyClass'] = 'page-video';
?>

<div class="video-screen">
	<div class="video_bg-top">&nbsp;</div>
	<div class="video_bgr-test">&nbsp;</div>
	<div class="video_bulbs">&nbsp;</div>
	<div class="video_glow-red">&nbsp;</div>
	<div class="container vs__container">
		<div class="vs__makeup">
			<a href=""><img src="/images/video/vs__makeup-49a787f04a.jpg" alt=""></a>
		</div>
		<div class="vs__title">БРОСЬ ВЫЗОВ МЕЙКАПЕРАМ!</div>
		<div class="vs__subtitle">#lorealparis_мейкаперы</div>
		<div class="vs__intro">Вдохновляйся и Покажи, на что<br>ты способен!</div>
		<div class="video-gallery video-gallery-1" id="tutorial">
			<div class="vg__title vg1__title">Смотри тьюториалы мейкапа от</div>
			<div class="vg__lp vg1__lp">
				<a href=""><img src="/images/video/vg1__lp-5535d71715.svg" alt=""></a>
			</div>
			<div class="vg__union vg1__union">
				<?php if(isset($videosTop[0])):?>
				<div class="vg__big-video vg1__big-video">
					<div class="close">X</div>
					<img src="<?=$videosTop[0]->image;?>" alt="">
					<a class="play-btn" href="<?=$videosTop[0]->key;?>"><img src="/images/s3__v__play-2d59db206b.png" alt=""></a>
				</div>
				<?php endif;?>
				<div class="vg__thumbnail-union vg1__thumbnail-union scroll-pane horizontal-only">
					<div class="vg__thumbnails vg1__thumbnails">
					<?php foreach ($videosTop as $key => $video):?>
						<?php if($key != 0):?>
							<div class="vg__thumbnail vg__thumbnail-1" video-id="<?=$video->key;?>">
								<img src="<?=$video->image;?>" alt="">
							</div>
						<?php endif;?>
					<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>

		<div class="video-gallery video-gallery-2" id="backstage">
			<div class="vg__title vg2__title">Смотри бекстейджи<br class="mobile-only" /> от</div>
			<div class="vg__lp vg2__lp">
				<a href=""><img src="/images/video/vg2__lp-5535d71715.svg" alt=""></a>
			</div>
			<div class="vg__union vg1__union">
				<?php if(isset($videosBottom[0])):?>
				<div class="vg__big-video vg2__big-video">
					<div class="close">X</div>
					<img src="<?=$videosBottom[0]->image;?>" alt="">
					<a class="play-btn" href="<?=$videosTop[0]->key;?>"><img src="/images/s3__v__play-2d59db206b.png" alt=""></a>
				</div>
				<?php endif;?>
				<div class="vg__thumbnail-union vg2__thumbnail-union scroll-pane horizontal-only">
					<div class="vg__thumbnails vg2__thumbnails">
					<?php foreach ($videosBottom as $key => $video):?>
						<?php if($key != 0):?>
							<div class="vg__thumbnail vg__thumbnail-1" video-id="<?=$video->key;?>">
								<img src="<?=$video->image;?>" alt="">
							</div>
						<?php endif;?>
					<?php endforeach;?>
					</div>
				</div>
			</div>
		</div>

		<div class="strobing-maning">
			<div class="sm sm-1">
				<div class="sm1-title">Стробинг<br>или майнинг?</div>
				<div class="sm1-subtitle">кто ты в мире мейкаперов</div>
				<div class="sm1-body">Можно ли назвать тебя гуру макияжа и специалистом в области<br>современных косметических средств, или твоя женская суперсила<br>вовсе не в мэйкапе? Стоит ли подругам доверять твоим<br>рекомендациям? Давай узнаем!</div>
				<div class="go-test">
					<a href="#test" class="test-link">Пройти тест</a>
				</div>
			</div>
			<div class="sm sm-2">
				<img src="/images/s3__sm-a7c4007519.png" alt="">
			</div>
		</div>
	</div>
</div>