//Menu
function mainMenu() {
    $('#header .h__burger').on('click',function () {
       $(this).toggleClass('active');
       $('#header #main-menu').toggle();
    });

    $('#header #main-menu > li').each(function () {
        if ( $(this).find('> a').attr('href') == location.pathname) {
            $(this).find('> a').addClass('active');
        }
    });

}

//Реализация видеогалереи
function videoGallery() {
    //Расчет ширины галерей
    $('.video-gallery .vg__union .vg__thumbnail-union .vg__thumbnails').each(function () {
        /*var countThumbnail = $(this).children().length,
            widthElem = $(this).find('> .vg__thumbnail:first-child').width(),
            marginElem = $(this).find('> .vg__thumbnail:first-child').outerWidth(true) - $(this).find('> .vg__thumbnail:first-child').width();

        $(this).width( (countThumbnail * widthElem) + (marginElem * (countThumbnail - 1) ) );
        */
    });

    $('.video-gallery .vg__union .vg__big-video .play-btn').on('click', function (e) {
        e.preventDefault();
        $(this).hide();
        $(this).parent().find('> img').hide();
        $(this).parent().find('.close').show();
        $(this).parent().append('<iframe frameborder="0" allowfullscreen="" src="http://www.youtube-nocookie.com/embed/' + $(this).attr('href') + '?rel=0&amp;autoplay=1&amp;iframe=true"></iframe>');
    });

    $('.video-gallery .vg__union .vg__big-video .close').on('click', function (e) {
        $(this).hide();
        $(this).parent().find('> img').show();
        $(this).parent().find('.play-btn').show();
        $(this).parent().find('iframe').remove();;
    });

    $('.video-gallery .vg__union .vg__thumbnail-union .vg__thumbnails .vg__thumbnail').on('click', function () {
        $(this).closest('.vg__union').find('.vg__big-video .close').hide();
        $(this).closest('.vg__union').find('.vg__big-video > img').attr('src',$(this).find('img').attr('src'));
        $(this).closest('.vg__union').find('.vg__big-video > img').show();
        $(this).closest('.vg__union').find('.vg__big-video iframe').remove();
        $(this).closest('.vg__union').find('.vg__big-video .play-btn').show();
        $(this).closest('.vg__union').find('.vg__big-video .play-btn').attr('href',$(this).attr('video-id'));
    });

}

function BuyProducts() {

    $('.product-union .products .product .product-info .buy a').on('click',function (e) {
        e.preventDefault();
        //$('#buy-popup').css('top',$('body,html').scrollTop());
        $('#buy-popup').addClass('active');
        $('#buy-popup .bp__links').html($(this).next().html());
        window.scrollTo(0, 0);
        $('#buy-popup').css('top', 0);
    });

    $('#buy-popup .bp__close').on('click',function () {
        $('#buy-popup').removeClass('active');
        $('#buy-popup').removeAttr('style');
        $('#buy-popup .bp__links').html('');
    });
}


function WidthProducts() {
    var countProd = $('.screen-2 .product-union .products').children().length,
        widthProd;

    if ( $(window).width() <= 1279 ) {
        widthProd = 285;
        $('.screen-2 .product-union .products .product').width(widthProd);
    } else {
        widthProd = 277.5;
        $('.screen-2 .product-union .products .product').width(widthProd);
    }

    $('.screen-2 .product-union .products').width( countProd * widthProd);

}

//Попап на новой фронт стр.
function StagePoppup(data){

    $('.stage .st__blocks .st__block .stb-play').on('click',function(){
        window.scrollTo(0, 0);
        $('#stage-popup').addClass('active');
        //Скроллы продуктов при клике (нужно 2 класса product-1 и product-2)
        if ( $(this).closest('.st__block').hasClass('st__block-1') ) {
            /*console.log(1);
            data.scrollToX($('.screen-2 .product-union .products .product:nth-child(1)').position().left);*/
            if ($('.screen-2 .product-union .products .product-1').length != 0) {
                data.scrollToX($('.screen-2 .product-union .products .product-1').position().left);
            }
        } else if ( $(this).closest('.st__block').hasClass('st__block-2') ) {
            /*console.log(2);
            data.scrollToX($('.screen-2 .product-union .products .product:nth-child(5)').position().left);*/
            if ($('.screen-2 .product-union .products .product-2').length != 0) {
                data.scrollToX($('.screen-2 .product-union .products .product-2').position().left);
            }
        }

    });

    $('#stage-popup .sp__close').on('click',function(){
        $('#stage-popup').removeClass('active');
    });

    $('#stage-popup .first .first__video .video-play').on('click',function(){
        $(this).hide();
        $(this).closest('.first__video').find('.video-back').hide();
        $(this).closest('.first__video').find('#video1').show();
        var myVideo = document.getElementById("video1"); 
        myVideo.play();
    });


}

$(document).ready(function () {

    //Для работы меню
    mainMenu();    

    //Покупка продуктов
    if ($('.product-union .products').length != 0) {
        BuyProducts();
    }

    //Запуска видеогалереи
    if ($('body').hasClass('page-video')) {
        videoGallery();
    }

    //Video через колорбокс
    //$('.y-video').colorbox({width:"1170px",height:"531px",iframe:true});

    //Видео с добавлением iframe в область, работает при определнной структуре (как на главной)
    $('.y-video').on('click', function (e) {
        e.preventDefault();
        $(this).hide();
        $(this).parent().find('img').hide();
        $(this).parent().append('<iframe frameborder="0" allowfullscreen="" src="' + $(this).attr('href') + '"></iframe>');
    });

    //Якорные ссылки
    $(".anchor-link").on("click", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        //анимируем переход на расстояние - top за 1500 мс
        $('body,html').animate({scrollTop: top}, 1500);
    });

    //Просчет продуктов
    WidthProducts();

    //Стидизация скролла
    var elemJsp = $('.scroll-pane').jScrollPane({
        showArrows: true,
        autoReinitialise: true,
        horizontalDragMinWidth: 124,
        horizontalDragMaxWidth: 124,
        mouseWheelSpeed:50,
        arrowButtonSpeed:50,
        trackClickSpeed:50,
        hideFocus:true
    });
    var apiJsp = elemJsp.data('jsp');

    //Попап на новой фронт стр.
    if ($('#stage-popup').length != 0) {
        StagePoppup(apiJsp);
    }
});

$(window).resize(function(){
    WidthProducts();
});

$(window).on('load', function () {
    var $preloader = $('#preloader'),
    timeLoad = window.performance.timing.domContentLoadedEventEnd - window.performance.timing.domContentLoadedEventStart,
        countDots = $('#preloader .pl__dots .pl__dot').length,
        timeDelay = timeLoad / 10;

    $('#preloader .pl__dots .pl__dot').each(function(i,el){
        $(this).delay((timeLoad / (countDots / i)) - timeDelay).fadeIn('slow');
    });

    $preloader.delay(timeLoad).fadeOut('slow');
});

$(document).on('click', 'a', function(e) {
    if(typeof $(this).data('event') !== 'undefined') {
        ga('send', 'event', $(this).data('event'), $(this).data('param'));
    }
});

$('.login-modal-btn').on('click',function (e) {
    e.preventDefault();
    $('#login-popup').addClass('active');
    window.scrollTo(0, 0);
    $('#login-popup').css('top', 0);
});

$('#login-popup .bp__close').on('click',function () {
    $('#login-popup').removeClass('active');
    $('#login-popup').removeAttr('style');
});

$(document).on('click', '.vote-btn', function (e) {
    e.preventDefault();

    var obj = $(this).closest('.view-row');

    $.ajax({
        type: 'GET',
        url: '/site/user-action',
        data: 'id='+obj.attr('data-id'),
        success: function (data) {
            obj.find('.score').html(data.score);
            obj.remove();
        }
    });
});