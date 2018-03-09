<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;

use common\models\Post;
use common\models\Week;

$this->title = 'Посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(['id' => 'grid-pjax']); ?>  
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function($model) {
                if($model->status === Post::STATUS_BANNED) {
                    return ['class' => 'danger'];
                } elseif($model->status === Post::STATUS_ACTIVE) {
                    return ['class' => 'success'];
                }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'week_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->week->name, Url::toRoute(['week/view', 'id' => $data->week_id]));
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'week_id', ArrayHelper::map(Week::find()->all(), 'id', 'name'), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->user->name ? $data->user->fullName : $data->user_id, Url::toRoute(['user/view', 'id' => $data->user_id]));
                    }
                ],
                [
                    'header' => 'Изображение',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::img($data->imageUrl, ['width' => '140px']);
                    }
                ],
                [
                    'attribute' => 'score',
                    'format' => 'raw',
                    'value' => function($data) {
                        return Html::a($data->score, Url::toRoute(['post-action/index', 'PostActionSearch[post_id]' => $data->id]));
                    },
                ], 
                [
                    'attribute' => 'status',
                    'value' => function($data) {
                        return $data->statusLabel;
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'status', Post::getStatusArray(), ['prompt'=>'']),
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($data) {
                        return date('d.m.Y H:i', $data->created_at);
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {approve} {ban} {update} {delete}',
                    'buttons' => [
                        'approve' => function ($url, $model) {
                            $url = Url::toRoute(['/post/status', 'id'=>$model->id, 'status' => Post::STATUS_ACTIVE]);
                            if($model->status == Post::STATUS_ACTIVE) {
                                return '';
                            }
                            return Html::a('<span class="glyphicon glyphicon-ok-sign"></span>', $url, [
                                'class' => 'status-toggle', 
                                'title' => 'Одобрить',
                                'data-pjax' => 0,
                            ]);
                        },
                        'ban' => function ($url, $model) {
                            $url = Url::toRoute(['/post/status', 'id'=>$model->id, 'status' => Post::STATUS_BANNED]);
                            if($model->status == Post::STATUS_BANNED) {
                                return '';
                            }
                            return Html::a('<span class="glyphicon glyphicon-remove-sign"></span>', $url, [
                                'class' => 'status-toggle', 
                                'title' => 'Забанить',
                                'data-pjax' => 0,
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>

<?php
$script = "
    $(document).on('click', '.status-toggle', function(e) {
        var obj = $(this);

        $.ajax({
            url: obj.attr('href'),
            type: 'POST',
            success: function(result) {
                $.pjax.reload({container:'#grid-pjax'});
            }
        });

        return false;
    });
";

$this->registerJs($script, yii\web\View::POS_END);?>