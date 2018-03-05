<?php
use yii\helpers\Html;
use yii\helpers\Json;
use frontend\widgets\cropimage\MrSectionWidgetAsset;

MrSectionWidgetAsset::register($this);
$removeBtn = !empty($template_image) ? '' : 'hidden';
$emptyBlock = empty($template_image) ? '' : 'hidden';
?>
    <div class="mr-section-base <?= $class_block ?>" style="width: <?= $plugin_options['width'] + 4 ?>px; ">
        <div class="mr-section" id="<?= $plugin_options['section'] ?>" data-role="upload_image"
             style="width: <?= $plugin_options['width'] + 4 ?>px; height: <?= $plugin_options['height'] + 3 ?>px;  ">
            <?php if ($template_image): ?>
                <?= $template_image ?>
            <?php endif; ?>
            <div class="mr-upload-block <?= $emptyBlock ?>">
                <?php if($label):?>
                    <h2><?=$label;?></h2>
                <?php else:?>
                    <h2>Загрузи фото<br> с <span></span> камеры</h2>
                <?php endif;?>
            </div>
            <span class="glyphicon glyphicon-remove mr-remove <?= $removeBtn ?>"></span>
        </div>
        
        <div class="mr-control-panel">
            <div class="btn-group">
                <?php $buttons = [
                    ['class'=>'rotate-left', 'icon'=>'rotate-left', 'title'=>'Повернуть влево'],
                    ['class'=>'zoom-out', 'icon'=>'zoom-out', 'title'=>'Отдалить'],
                    ['class'=>'fit', 'icon'=>'resize-small', 'title'=>'По размеру окна'],
                    ['class'=>'zoom-in', 'icon'=>'zoom-in', 'title'=>'Приблизить'],
                    ['class'=>'rotate-right', 'icon'=>'rotate-right', 'title'=>'Повернуть вправо'],
                ];?>
                <?php foreach ($buttons as $b) {
                    echo Html::button('<span></span>', ['class'=>'mr-'.$b['class'], 'title'=>$b['title']]);
                }?>   

            </div>
            <button class='mr-upload mr-upload-btn-section' title='Выбрать файл' type='button'>
                <span></span>
            </button>
        </div>
        <?= $form->field($model, $attribute, ['template' => '{input}'])->fileInput($options); ?>
        
        <div class="mr-data-inputs">
            <?=Html::activeHiddenInput($model, $attribute_x, ['class'=>'mr-x']) ?>
            <?=Html::activeHiddenInput($model, $attribute_y, ['class'=>'mr-y']) ?>
            <?=Html::activeHiddenInput($model, $attribute_width, ['class'=>'mr-w']) ?>
            <?=Html::activeHiddenInput($model, $attribute_height, ['class'=>'mr-h']) ?>
            <?=Html::activeHiddenInput($model, $attribute_scale, ['class'=>'mr-scale']) ?>
            <?=Html::activeHiddenInput($model, $attribute_angle, ['class'=>'mr-angle']) ?>
        </div>
    </div>

<?php
$plugin_options['section'] = '#' . $plugin_options['section'];
$plugin_options['id_input_file'] = '#' . $plugin_options['id_input_file'];
$options = Json::encode($plugin_options, true);
$section = $plugin_options['section'];

$this->registerJs("
    mr_section_init($options);
");
?>