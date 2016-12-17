<div class="comment-view" id="comments">
    <h2>Комментарии:</h2>
    <?php if ($model) { ?>
        <?=
        $this->render('_form', [
            'model' => $model
        ])
        ?>

    <?php } ?>
    <?php
    echo \yii\widgets\ListView::widget([
        'dataProvider' => $comments,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_view',
        'emptyText' => '',
        'summary' => '',
    ]);
    ?>
</div>

