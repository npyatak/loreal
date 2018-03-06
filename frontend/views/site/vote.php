
<?php if($posts):?>
	<div id="container" class="bothie-blocks wow fadeInUp">
		<?=$this->render('_posts', ['posts' => $posts]);?>
	</div>

    <a class="load-more">Загрузить ещё</a>
<?php endif;?>

<?php $script = "
    $('.load-more').on('click', function() {
        var ids = [];
        var btn = $(this);
        btn.hide();
        //btn.parent().find('.loading .icon').show();

        var ids = [];
        $('.grid-item').each(function(el) {
            ids.push($(this).data('id'));
        });

        $.ajax({
            data: {ids: ids},
            success: function(data) {
                var html = $(data);
                $('#container').append(html);

                btn.parent().find('.loading .icon').hide();
                btn.show();

                if(data.length == 1) {
                    btn.parent().remove();
                }
            }
        });
    });
";?>
<?php $this->registerJs($script, yii\web\View::POS_END);?>