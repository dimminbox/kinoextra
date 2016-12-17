<?php
use app\widgets\Social\Social;
?>
<div class="middle_content">
    <h1 class="filmname"><?= \app\controllers\CController::$h1 ?></h1>

    <ul class="featured_nav">
        <?php foreach ($alphavit as $index => $tags) : ?>
            <div style="margin: 10px;">
                <h3><?= mb_strtoupper($index,'UTF-8') ?></h3>

                <?php foreach ($tags as $tag): ?>
                    <span class="country_name">
                        <strong><a href="<?= $tag->getUrl() ?>"><?= $tag->getName() ?></a></strong>
                    </span>
                <?php endforeach; ?>

            </div>
        <?php endforeach; ?>
    </ul>
    <?= Social::widget() ?>
</div>