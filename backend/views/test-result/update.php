<?php
use yii\helpers\Html;

$title = 'от ' . $model->range_start.' до '.$model->range_end;
$this->title = 'Изменить диапазон: '.$title;
$this->params['breadcrumbs'][] = ['label' => 'Диапазоны теста', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
