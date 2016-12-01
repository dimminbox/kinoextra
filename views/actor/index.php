
<div class="middle_content">
    <h1 class="filmname"><?= \app\controllers\CController::$h1?></h1>

    <ul class="featured_nav">
        <?php
        echo \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_item',
            'summary' => '',
            'options' => ['id' => 'productlist'],
            'pager' => [
                'maxButtonCount' => 5
            ]
        ]);
        ?>
    </ul>
</div>