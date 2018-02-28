<?php
use yii\helpers\Html;

$this->title = 'Изменить шеринг: ' . $model->uri;
$this->params['breadcrumbs'][] = ['label' => 'Шеринги', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uri, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>

<div class="update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
