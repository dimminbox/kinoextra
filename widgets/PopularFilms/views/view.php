<?php if (count($films) != 0) : ?>
    <h2>Популярные фильмы</h2>
    <ul class="ppost_nav wow fadeInDown">
        <?php foreach ($films as $film) : ?>
            <li>
                <div class="media"><a class="media-left" href="<?= $film->getUrl() ?>"><img src="<?= $film->getImage() ?>" alt="<?= $film->getName() ?>"></a>
                    <div class="media-body"><a class="catg_title" href="<?= $film->getImage() ?>"><?= $film->getName() ?></a></div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>