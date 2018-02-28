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

/*test*/
//Вызов результата
function GoFinal(data, results) {
    $('#test .question-template').hide();
    $('#test .next-template').hide();
    $('#test .result-template').show();

    $('#test .result-template .r__status-title').html(data[0]);
    $('#test .result-template .r__status-desc').html(data[1]);

    var result = results[Number(data[2])];
    updateShare(result);
}
//Обрабочик вызова след. вопроса
function GoNext(data) {
    console.log(data);
    var NextQ = Number($('#test .question-template').attr('data-q')) + 1;

    $('#test .question-template').hide();
    $('#test .next-template').show();

    $('#test .next-template').attr('next-q',NextQ);

    $('#test .next-template .n__qnumber').html($('#test .question-template').attr('data-q'));
    html = data.comment_title + '<br><span>'+data.comment+'</title>';
    $('#test .next-template .n__res1').html(html);
    $('#test .next-template .n__qbtn span').html(NextQ);

}
//Сгенерировать вопрос
function GenerateQuestion(data) {
    $('#test .next-template').hide();
    $('#test .result-template').hide();
    $('#test .question-template').show();

    $('#test .question-template').attr('data-q',data['number']);
    $('#test .question-template .qt__qnumber').html(data['number']);
    $('#test .question-template .qt__q').html(data['vopros']);

    $('#test .question-template .qt__qimg').html("");
    if ( data['image'] != "" ) {
        $('#test .question-template .qt__qimg').html('<img src="images/' + data['image'] + '" alt="">');
    }

    $('#test .question-template .qt__variant-answers').html("");

    for (var x in data['variant']) {
        $('#test .question-template .qt__variant-answers').append('<div class="qt__va" q-key="'+ x +'">' + data['variant'][x] + '</div>');
    }

}
/* end test*/

function BuyProducts() {

    $('.product-union .products .product .product-info .buy a').on('click',function (e) {
        e.preventDefault();
        $('#buy-popup').css('top',$('body,html').scrollTop());
        $('#buy-popup').addClass('active');
        $('#buy-popup .bp__links').html($(this).next().html());
    });

    $('#buy-popup .bp__close').on('click',function () {
        $('#buy-popup').removeClass('active');
        $('#buy-popup').removeAttr('style');
        $('#buy-popup .bp__links').html('');
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

    //Стидизация скролла
    $(function() {
        $('.scroll-pane').jScrollPane({
            showArrows: true,
            //autoReinitialise: true,
            horizontalDragMinWidth: 124,
            horizontalDragMaxWidth: 124,
            mouseWheelSpeed:50,
            arrowButtonSpeed:50,
            trackClickSpeed:50,
            hideFocus:true
        });
    });

    //$('.test-link').colorbox({width:"1170px",height:"531px",inline:true, href:$(this).attr('href')});
    var counter = 0;

    var qParse = eval('(' + qParseJson + ')');
    var qCount = Object.keys(qParse).length;
    var resParse = eval('(' + resParseJson + ')');
    var pointParse = eval('(' + pointParseJson + ')');
    var finalParse = eval('(' + finalParseJson + ')');


    // var qParse = $.parseJSON(qParseJson);
    // var qCount = Object.keys(qParse).length;

    // var resParse = $.parseJSON(resParseJson);

    // var pointParse = $.parseJSON(pointParseJson);

    // var finalParse = $.parseJSON(finalParseJson);

    //Запуск теста
    $('.test-link').on('click',function (e) {
        e.preventDefault();
        //Первый вопрос
        GenerateQuestion(qParse['1']);
        $('#test').addClass('active');
        $('#test').css('top',$('.screen-3').offset().top);
    });

    $('#test .test__close').on('click',function () {
        $(this).parent().removeClass('active');
    });

    //Обработчик на варианты ответа
    $("#test .question-template .qt__variant-answers").on('click','> *',function () {

        $('#test .question-template').attr('q-key',$(this).attr('q-key'));

        GoNext(resParse[$('#test .question-template').attr('data-q')][$('#test .question-template').attr('q-key')]);

        counter += pointParse[$('#test .question-template').attr('data-q')][$('#test .question-template').attr('q-key')];

    });

    //Переход на след вопрос
    $("#test .next-template .n__qbtn").on('click',function () {

        if ( $("#test .next-template").attr('next-q') > qCount ){
            var fin = [];
            for (var x in finalParse){
                if ( finalParse[x]['min'] <= counter && finalParse[x]['max'] >= counter ){
                    fin[0] = finalParse[x]['title'];
                    fin[1] = finalParse[x]['description'];
                    fin[2] = finalParse[x]['id'];
                }
            }
            GoFinal(fin, finalParse);
        } else {
            GenerateQuestion(qParse[$("#test .next-template").attr('next-q')]);
        }
    });
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