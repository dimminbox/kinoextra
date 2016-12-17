
<?php
use yii\helpers\Html;

?>
<div class="comment-view well" id="comment<?=$model->id?>" style="<?=$model->getStyle()?>">

    <p><strong><?=$model->content?></strong></p>

<p><small class="pull-left">Автор: <?= $model->user?></small><br>
<small>Отзыв добавлен: <?= $model->date_modified?></small></p>
<p><strong>Оценка: <?=$model->rating?></strong></p>
</div>
