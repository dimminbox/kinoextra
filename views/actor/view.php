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