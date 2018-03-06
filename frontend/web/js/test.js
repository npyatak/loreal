
/*test*/
//Вызов результата
function GoFinal(data) {
    $('#test .question-template').hide();
    $('#test .next-template').hide();
    $('#test .result-template').show();

    $('#test .result-template .r__status-title').html(data[0]);
    $('#test .result-template .r__status-desc').html(data[1]);

    $('#test .result-template .r__banner').html('<img src="'+ data[3] +'" alt="">');
    $('#test .result-template .r__banner-bottom').html('<img src="'+ data[4] +'" alt="">');
    //$('#test .result-template .r__lessons').html(data[5]);

    var res = Number(data[2]);
    updateShare(res);
}
//Обрабочик вызова след. вопроса
function GoNext(data) {
    var NextQ = Number($('#test .question-template').attr('data-q')) + 1;

    $('#test .question-template').hide();
    $('#test .next-template').show();

    $('#test .next-template').attr('next-q',NextQ);

    $('#test .next-template .n__qnumber').html($('#test .question-template').attr('data-q'));
    html = data.comment_title ? data.comment_title + '<br>' : '';
    html = html + '<span>'+data.comment+'</span>';
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
        $('#test .question-template .qt__qimg').html('<img src="' + data['image'] + '" alt="">');
    }

    $('#test .question-template .qt__variant-answers').html("");

    for (var x in data['variant']) {
        $('#test .question-template .qt__variant-answers').append('<div class="qt__va" q-key="'+ x +'">' + data['variant'][x] + '</div>');
    }

}
/* end test*/

$(document).ready(function () {

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
        //$('#test').css('top',$('.screen-3').offset().top);
        //$('#test').css('top',$('body,html').scrollTop());
        window.scrollTo(0, 0);
        $('#test').css('top', 0);
    });

    $('#test .test__close').on('click',function () {
        $(this).parent().removeClass('active');
        window.history.pushState(null, '', '/');
    });

    //Обработчик на варианты ответа
    $("#test .question-template .qt__variant-answers").on('click','> *',function () {

        $('#test .question-template').attr('q-key',$(this).attr('q-key'));

        GoNext(resParse[$('#test .question-template').attr('data-q')][$('#test .question-template').attr('q-key')]);

        counter += pointParse[$('#test .question-template').attr('data-q')][$('#test .question-template').attr('q-key')];
        //console.log(counter);
        window.scrollTo(0, 0);

        if ( $('#test .question-template').attr('data-q') == qCount) {
            $('#test .next-template .n__qbtn').addClass('last-q');
        }
        

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
                    fin[3] = finalParse[x]['image'];
                    fin[4] = finalParse[x]['image_2'];
                    //fin[5] = finalParse[x]['link'];
                }
            }
            counter = 0;
            GoFinal(fin);
            window.scrollTo(0, 0);
        } else {
            GenerateQuestion(qParse[$("#test .next-template").attr('next-q')]);
            window.scrollTo(0, 0);
        }
    });
});