<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Week */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Weeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="week-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'number',
            'name',
            'image',
            
            [
                'attribute' => 'date_start',
                'value' => function($data) {
                    return date('d.m.Y H:i', $data->date_start);
                }
            ],
            [
                'attribute' => 'date_end',
                'value' => function($data) {
                    return date('d.m.Y H:i', $data->date_end);
                }
            ],
            'description_1:ntext',
            'description_2:ntext',
            'hint_1',
            'hint_2',
            'winners:ntext',
            'status',
        ],
    ]) ?>

</div>
