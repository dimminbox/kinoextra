<?php
use app\widgets\Poll\Poll;
?>
<div class="filmDetail" itemscope itemtype="http://schema.org/Person">			

    <h1 class="filmname" itemprop="name">
        <?= $actor->getName() ?>
    </h1>

    <div class="entry">
        <img src="<?= $actor->getImage(175, 250) ?>" alt="<?= $actor->getName() ?>" itemprop="image">

        <div class="promo">
            <div class="short">
                <div>Описание: <span><?= $actor->getDescription() ?></span></div>
                <div>Жанры: <span><?= $genres ?></span></div>
                <div>Стили: <span><?= $styles; ?></span></div>
                <div>Количество просмотров фильмов с участием этого актёра: <span><?= $visites ?></span></div>
                <div>Количество комментариев к фильмам с участием этого актёра: <span><?= $comments; ?></span></div>
            </div>


        </div>
    </div>
</div>

<h3>Фильмы с участием актёра:</h3>
<ul class="featured_nav">
    <?php foreach ($films as $model) : ?>
        <li class="fadeInDown">

            <div class="film" itemscope="" itemtype="http://schema.org/Movie">			

                <h2 class="filmname">
                    <a href="<?= $model->getUrl() ?>" itemprop="name"><?= $model->getName() ?></a>
                </h2>

                <div class="ball">
                    <strong>Оцените:</strong>
                    <?= Poll::widget(['model' => $model->id]) ?>
                </div>

                <div class="entry">
                    <a href="<?= $model->getUrl() ?>" class="alignleft">
                        <img src="<?= $model->getImage(175, 250) ?>" alt="<?= $model->getAlt() ?>"></a>

                    <div class="promo">
                        <div class="short">
                            <div>Название: <?= $model->getName(); ?></div>
                            <div itemprop="genre">Категории: <?= $model->getStyleHuman() ?></div>
                            <div>Год: <?= $model->getYear(); ?></div>
                            <div>Страна: <?= $model->getCountryHuman(); ?></div>
                            <div>Режиссёр: <?= $model->getDirector(); ?></div>
                        </div>

                        <div class="mini" itemprop="about"><?= $model->getShortDesc(); ?></div>

                        <div class="foot">
                            <div class="online">
                                <a class="numbers" href="<?= $model->getUrl() ?>">cмотреть онлайн</a>
                            </div>
                            <div class="visited">
                                <span class="numbers"><?= $model->getVisited() ?></span>
                            </div>
                            <div class="col_comment">
                                <span class="numbers"><?= $model->getCountComments() ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </li>
    <?php endforeach; ?>
</ul>
<?= app\widgets\Social\Social::widget(); ?>