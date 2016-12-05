<?php $image = $model->getImage(175, 250)?>

<?php if( ($image!="")): ?>
<li class="fadeInDown">

    <div class="film" itemscope="" itemscope itemtype="http://schema.org/Person">			

        <h2 class="filmname">
            <a href="<?= $model->getUrl() ?>" itemprop="name"><?= $model->getName() ?></a>
        </h2>

        <div class="entry">
            <a href="<?= $model->getUrl() ?>" class="alignleft">
                <img src="<?= $model->getImage(175, 250) ?>" /></a>

            <div class="promo">
                <div class="short">
                    <div><?= $model->getDescription(); ?></div>
                </div>

                <div class="foot">
                    <div class="online">
                        <a class="numbers" href="<?= $model->getUrl() ?>">Фильмография</a>
                    </div>
                    <div class="col_comment">
                        <span class="numbers"><?= $model->getFilmCount() ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</li>
<?php endif; ?>