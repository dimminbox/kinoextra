<?php

use app\widgets\MainStyle\MainStyle;
use app\widgets\PopularFilms\PopularFilms;
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
        <link rel="stylesheet" type="text/css" href="/css/style.css">
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
                            <form action="#">
                                <input class="search_bar" type="text" placeholder="Search here">
                            </form>
                        </div>
                    </div>
            </nav>
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
                                    <div role="tabpanel" class="tab-pane fade active in" id="recentComment">
                                        <ul class="ppost_nav  fadeInDown">
                                            <li>
                                                <div class="user">
                                                    <div>
                                                        <span class="userName">Автор Берсо: </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p id="citata">"Капец фигня"</p>

                                                    <div class="forumLinks">
                                                        <p class="filmName">Фильм: "<a href="/film/sluga_naroda">Слуга народа</a>"</p>
                                                        <a href="/film/sluga_naroda#comment1256">Читать</a> | <a href="/film/sluga_naroda?reply&amp;commentId=1256#comments">Ответить</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user">
                                                    <div>
                                                        <span class="userName">Автор Берсо: </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p id="citata">"Капец фигня"</p>

                                                    <div class="forumLinks">
                                                        <p class="filmName">Фильм: "<a href="/film/sluga_naroda">Слуга народа</a>"</p>
                                                        <a href="/film/sluga_naroda#comment1256">Читать</a> | <a href="/film/sluga_naroda?reply&amp;commentId=1256#comments">Ответить</a>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="recentBall">
                                        <ul class="ppost_nav fadeInDown">
                                            <li>
                                                <div class="user">
                                                    <div>
                                                        <span class="userName">Автор Берсо: </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p id="citata">"Капец фигня"</p>

                                                    <div class="forumLinks">
                                                        <p class="filmName">Фильм: "<a href="/film/sluga_naroda">Слуга народа</a>"</p>
                                                        <a href="/film/sluga_naroda#comment1256">Читать</a> | <a href="/film/sluga_naroda?reply&amp;commentId=1256#comments">Ответить</a>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
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
                                <h2>Labels</h2>
                                <ul class="labels_nav">
                                    <li><a href="#">Games</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Slider</a></li>
                                    <li><a href="#">Life &amp; Style</a></li>
                                    <li><a href="#">Ver</a></li>
                                    <li><a href="#">Sports</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm3">
                            <div class="footer_widget">
                                <h2>Popular Post</h2>
                                <ul class="ppost_nav  fadeInLeftBig">
                                    <li>
                                        <div class="media"><a href="pages/single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                            <div class="media-body"><a href="pages/single_page.html" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><a href="pages/single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                            <div class="media-body"><a href="#" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media"><a href="pages/single_page.html" class="media-left"><img alt="" src="images/70x70.jpg"></a>
                                            <div class="media-body"><a href="#" class="catg_title">Aliquam malesuada diam eget turpis varius</a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm3">
                            <div class="footer_widget  fadeInRightBig">
                                <h2>Flickr Images</h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm3">
                            <div class="footer_widget  fadeInRightBig">
                                <h2>Jetpack Subscription Widget</h2>
                                <form action="#" class="subscribe_form">
                                    <p id="subscribe-text">We promise, we will only send you awesome stuff which will make your day!</p>
                                    <p id="subscribe-email">
                                        <input type="text" placeholder="Email Address" name="email">
                                    </p>
                                    <p id="subscribe-submit">
                                        <input type="submit" value="Submit">
                                    </p>
                                </form>
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