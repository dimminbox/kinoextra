<?php

use app\widgets\Poll\Poll;
?>

<?= Poll::widget(['model' => $filmId, 'stars'=>$stars]) ?>