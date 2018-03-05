<?php 
use yii\helpers\Html;

use common\models\PostAction;
?>

<?php if(Yii::$app->user->isGuest):?>
    <?=Html::a('<span class="icon">login</span>', null, [
        'class' => 'login-modal-btn',
    ]);?>
<?php elseif($post->userCan(PostAction::TYPE_LIKE)):?>
    <?=Html::a('<span class="icon">login</span>', null, [
        'class' => 'bothie-btn',
        'data-id' => $post->id, 
    ]);?>
<?php endif;?>