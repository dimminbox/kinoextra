<?php

use app\widgets\Poll\Poll;
?>
<li class="fadeInDown">

    <div class="film" itemscope="" itemtype="http://schema.org/Movie">			

        <h2 class="filmname">
            <a href="<?=$model->getUrl()?>" itemprop="name"><span><?=$model->key?> место</span> <?=$model->getName()?></a>
        </h2>

        <div class="ball">
            <strong>Оцените:</strong>
            <?= Poll::widget(['model' => $model->id]) ?>

        </div>

        <div class="entry">
            <a href="<?=$model->getUrl()?>" class="alignleft">
                <img src="<?=$model->getImage(175, 250)?>" alt="<?=$model->getAlt()?>"></a>
            
            <div class="promo">
                <div class="short">
                    <div>Название: <?=$model->getName();?></div>
                    <div itemprop="genre">Категории: <?=$model->getStyleHuman()?></div>
                    <div>Год: <?=$model->getYear();?></div>
                    <div>Страна: <?=$model->getCountryHuman();?></div>
                    <div>Режиссёр: <?=$model->getDirector();?></div>
                </div>

                <div class="mini" itemprop="about"><?=$model->getShortDesc();?></div>

                <div class="foot">
                    <div class="online">
                        <a class="numbers" href="<?=$model->getUrl()?>">cмотреть онлайн</a>
                    </div>
                    <div class="visited">
                        <span class="numbers"><?=$model->getVisited()?></span>
                    </div>
                    <div class="col_comment">
                        <span class="numbers"><?=$model->getCountComments()?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</li>