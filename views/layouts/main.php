<?php

use app\widgets\MainStyle\MainStyle;
use app\widgets\PopularFilms\PopularFilms;
use app\widgets\LastComments\LastComments;
use app\widgets\LastEstimations\LastEstimations;
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= \app\controllers\CController::$metaTitle ?></title>
        <meta name="description" content="<?= \app\controllers\CController::$metaDescription ?>"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/animate.css">
        <link rel="stylesheet" type="text/css" href="/css/slick.css">
        <link rel="stylesheet" type="text/css" href="/css/theme.css">
        <link rel="stylesheet" type="text/css" href="/css/poll.css">
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <meta name="revisit-after" content="1 days" />
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

        <!-- Put this script tag to the <head> of your page -->
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?63"></script>
        <meta name='yandex-verification' content='6c8c6572d093b4a9' />
        <script type="text/javascript">
            VK.init({apiId: 3158676, onlyWidgets: true});
        </script>

    </head>
    <body>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
        <header id="header">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav custom_nav">
                                <li><a href="#">Лучшие фильмы</a></li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">По категориям</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">На реальных событиях</a></li>
                                        <li><a href="#">О животных</a></li>
                                        <li><a href="#">Социальные</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">По жанрам</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Биография</a></li>
                                        <li><a href="#">Боевики</a></li>
                                        <li><a href="#">Военные</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">По годам</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">2016</a></li>
                                        <li><a href="#">2015</a></li>
                                        <li><a href="#">2014</a></li>
                                        <li><a href="#">2013</a></li>
                                    </ul>
                                </li>
                                <li><a href="pages/contact.html">По актёрам</a></li>
                                <li><a href="pages/404.html">По странам</a></li>
                                <li><a href="pages/404.html">По интересам</a></li>
                            </ul>
                        </div>
                        <div class="search"><a class="search_icon" href="#"><i class="fa fa-search"></i></a>
                            <script>
                                (function () {
                                    var cx = '016002963691455401839:ctj02af2liw';
                                    var gcse = document.createElement('script');
                                    gcse.type = 'text/javascript';
                                    gcse.async = true;
                                    gcse.src = (document.location.protocol == 'https' ? 'https:' : 'http:') +
                                            '//www.google.com/cse/cse.js?cx=' + cx;
                                    var s = document.getElementsByTagName('script')[0];
                                    s.parentNode.insertBefore(gcse, s);
                                })();
                            </script>
                        </div>
                    </div>
            </nav>
             <p id="searchBox" class="search_bar"><gcse:search></gcse:search></p>
        </header>
        <section id="content">

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="left_sidebar">
                            <div class="single_widget">
                                <?= MainStyle::widget() ?>
                            </div>
                            <div class="single_widget">
                                <?= PopularFilms::widget() ?>
                            </div>
                            <div class="single_widget">
                                <h2>Интересные вещи</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-8">
                        <?= $content ?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="right_sidebar">

                            <div class="single_widget">
                                <h2>Мы Вконтакте</h2>
                                <div class="sidebar sidebar-left">
                                    <!-- VK Widget -->
                                    <div id="vk_groups"></div>
                                    <script type="text/javascript">
                                        VK.Widgets.Group("vk_groups", {mode: 0, width: "223", height: "290"}, 43651229);
                                    </script>
                                </div>
                            </div>


                            <div class="single_widget">
                                <ul class="nav nav-tabs custom-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#recentComment" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Комментрии</a></li>
                                    <li role="presentation" class=""><a href="#recentBall" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">Оценки</a></li>
                                </ul>
                                <div class="tab-content">

                                    <?= LastComments::widget() ?>
                                    <?= LastEstimations::widget() ?>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer id="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm3">
                            <div class="footer_widget  fadeInLeftBig">
                                <h2>Обратная связь</h2>
                                <ul class="labels_nav">
                                    <li><a rel="nofollow" href="/authors">Правообладателям</a></li>
                                    <li><a rel="nofollow" href="/advertiser">Рекламодателям</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm3">
                            <div class="footer_widget  fadeInRightBig">
                                <h2>Статистика</h2>
                                <!--LiveInternet counter--><script type="text/javascript"><!--
                                               document.write("<a href='http://www.liveinternet.ru/click' " +
                                            "target=_blank><img src='//counter.yadro.ru/hit?t22.6;r" +
                                            escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                                            ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                                    screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                                            ";" + Math.random() +
                                            "' alt='' title='LiveInternet: показано число просмотров за 24" +
                                            " часа, посетителей за 24 часа и за сегодня' " +
                                            "border='0' width='88' height='31'><\/a>")
                                    //--></script><!--/LiveInternet-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script> 
        <script src="/js/slick.min.js"></script> 
        <script src="/js/custom.js"></script>
    </body>
</html>