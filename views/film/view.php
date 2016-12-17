<?php
use app\widgets\Poll\Poll;
use app\widgets\Social\Social;
?>
<li class="fadeInDown">

    <div class="filmDetail" itemscope="" itemtype="http://schema.org/Movie">			

        <h1 class="filmname">
            <?= $model->getName() ?>
        </h1>
        <div class="helpers">
            <a href="#online">Смотреть</a>
            <a href="#description">Описание</a>
            <a href="#comments">Отзывы</a>
        </div>
        <div class="entry">
            <a href="<?= $model->getUrl() ?>" class="alignleft">
                <img src="<?= $model->getImage(175, 250) ?>" alt="<?= $model->getAlt() ?>"></a>

            <div class="promo">
                <div class="short">
                    <div>Категории: <span><?= $model->getStyleHuman() ?></span></div>
                    <div>Интересы:
                        <?php foreach ($tags as $tag) : ?>
                            <span><a class="think" href="<?= $tag->getUrl() ?>"><?= $tag->getName() ?></a></span>
                        <?php endforeach; ?>
                    </div>
                    <div itemprop="genre">Жанры:
                        <?php foreach ($genres as $genre) : ?>
                            <span><a class="think" href="<?= $genre->getUrl() ?>"><?= $genre->getName() ?></a></span>
                        <?php endforeach; ?>
                    </div>
                    <div>Год: <span><?= $model->getYear(); ?></span></div>
                    <div>Страна: <span><?= $model->getCountryHuman(); ?></span></div>
                    <div>Актёры: <span><?= $model->getActor(); ?></span></div>
                    <div>Режиссёр: <span><?= $model->getDirector(); ?></span></div>
                </div>
                <div class="ball">
                    <strong>Оцените:</strong>
                    <?= Poll::widget(['model' => $model->id]) ?>

                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <div id="description"><?= $model->getLongDesc() ?></div>
        <div class="clearfix"></div>
        <?php if ($model->getTrailer() != '') : ?>
            <div class="trailer" itemprop="video" itemscope itemtype="http://schema.org/CreativeWork"><strong>Трейлер фильма <?= $model->getName() ?></strong></div>
            <?= $model->getTrailer() ?>
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if ($model->getVideo() != '') : ?>
            <div class="trailer" id="online" itemprop="video" itemscope itemtype="http://schema.org/CreativeWork"><strong>Смотреть онлайн фильм <?= $model->getName() ?></strong></div>
            <?= $model->getVideo() ?>
        <?php endif; ?>
    </div>
    <?= Social::widget(); ?>
    <?= \spanjeta\comments\CommentsWidget::widget(['model' => $model]); ?>

</li>