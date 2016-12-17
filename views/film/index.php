
<div class="middle_content">
    <h1 class="filmname"><?= \app\controllers\CController::$h1?></h1>
    <p style=""><?= \app\controllers\CController::$description?></p>

    <?= app\widgets\AutoPlay\AutoPlay::widget(); ?>
    <ul class="featured_nav">
        <?php
        echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => ($best) ? '_best_item' : '_item',
            'summary' => '',
            'options' => ['id' => 'productlist'],
            'pager' => [
                'maxButtonCount' => 5
            ]
        ]);
        ?>
    </ul>
    <?= app\widgets\Social\Social::widget(); ?>
</div>