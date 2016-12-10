<li class="fadeInDown">

    <div class="filmDetail" itemscope="" itemtype="http://schema.org/Movie">			

        <h2 class="filmname">
            <?= $model->getName() ?>
        </h2>

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
                    <p><link rel="stylesheet" type="text/css" href="/protected/extensions/DimmPoll/skin_16/poll.css"><script type="text/javascript">
                        $(document).ready(function () {
                            $(".zvezda").click(function () {
                                //alert($(this).attr("title"));
                            });
                            $(".zvezda").hover(
                                    function () {
                                        $(".small").css("background", "none");
                                        cur = $(this).attr("title");
                                        elem = 1;
                                        while (elem <= cur) {
                                            $("div#val_7_film" + elem).css("background-image", "url('/protected/extensions/DimmPoll/skin_16/services11.png')");
                                            elem++;
                                        }
                                    },
                                    function () {
                                        $(".zvezda").css("background-image", "");
                                    }
                            );

                        });

                        </script>
                    </p><div id="mposter"></div>
                    <div id="estimate_580_film">
                        <div id="my" class="my_580_film">
                            <noindex><a href="#" id="yt0"><div title="1" class="zvezda" id="val580_film1"><div class="small" id="small1" style="width: 100%;"></div></div></a></noindex><noindex><a href="#" id="yt1"><div title="2" class="zvezda" id="val580_film2"><div class="small" id="small2" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt2"><div title="3" class="zvezda" id="val580_film3"><div class="small" id="small3" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt3"><div title="4" class="zvezda" id="val580_film4"><div class="small" id="small4" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt4"><div title="5" class="zvezda" id="val580_film5"><div class="small" id="small5" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt5"><div title="6" class="zvezda" id="val580_film6"><div class="small" id="small6" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt6"><div title="7" class="zvezda" id="val580_film7"><div class="small" id="small7" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt7"><div title="8" class="zvezda" id="val580_film8"><div class="small" id="small8" style="width: 100%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt8"><div title="9" class="zvezda" id="val580_film9"><div class="small" id="small9" style="width: 0%; background: none;"></div></div></a></noindex><noindex><a href="#" id="yt9"><div title="10" class="zvezda" id="val580_film10"><div class="small" id="small10" style="background: none;"></div></div></a></noindex>    </div>
                        <div class="golos">
                            8         <span>1 голос</span>
                        </div>
                    </div>
                    <p></p>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <p><?= $model->getLongDesc() ?></p>
        <div class="clearfix"></div>
        <?php if ($model->getTrailer() != '') : ?>
            <div class="trailer" itemprop="video" itemscope itemtype="http://schema.org/CreativeWork"><strong>Трейлер фильма <?= $model->getName() ?></strong></div>
            <?= $model->getTrailer() ?>
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if ($model->getVideo() != '') : ?>
            <div class="trailer" itemprop="video" itemscope itemtype="http://schema.org/CreativeWork"><strong>Смотреть онлайн фильм <?= $model->getName() ?></strong></div>
            <?= $model->getVideo() ?>
        <?php endif; ?>
    </div>
    <?=   \spanjeta\comments\CommentsWidget::widget(['model'=>$model]); ?>

</li>