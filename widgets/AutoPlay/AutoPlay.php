<?php

namespace app\widgets\AutoPlay;

use yii\bootstrap\Widget;
use Yii;

class AutoPlay extends Widget {

    public $closed = true;

    public function run() {
        parent::run();

        if (isset($_GET['temp']))
            return '';

        $result = '';

        switch (Yii::$app->params['videoBanner']) {
            case 'advmaker' :
                $result = '<div class="topBanner">
		<!--noindex--><div id="amvb25007"></div><!--/noindex-->
		<!--noindex--><script async type="text/javascript" src="//am15.net/vb.php?s=52459&f=50&d=25007&width=600&height=320&dummy=1"></script><!--/noindex-->';
                break;
            case 'freshvideo':
                $result = '<div class="topBanner no_ampr" style="margin-top:10px;"><div id="amvb1759676885"></div><iframe id="adv_kod_frame" src="http://fresh-video.com/kod.php?param=65783835476832464c6e35383350525339576f62324c7053432b7755332f764c4b48714e4b794142716133434f384e435241796b6375353869513d3d" width="600" height="320" frameborder="0" scrolling="no" allowfullscreen="true"></iframe><script type="text/javascript" src="http://fresh-video.com/zaglushki/zagl58071de895992.js"></script>';
                break;
        }
        if ($this->closed) {
            $result .= '<a href="#" style="display: block;" onclick=\'$("div.topBanner").remove();\'>Close</a></div>';
        } else
            $result .= '</div>';

        if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
            $Info = \Yii::createObject([
                        'class' => '\rmrevin\yii\geoip\HostInfo',
                        'host' => $_SERVER['REMOTE_ADDR'], // some host or ip
            ]);

            if ($Info->getCountryCode() != "RU") {
                $result = '<div class="topBanner">';
                $result .= '<!--noindex--><div id="ambn524594"></div><script type="text/javascript" src="//am15.net/bn.php?s=52459&f=4&d=524594"></script><!--/noindex-->';
                $result .= '</div>';
                $result .= '</div>';
            }
        }

        return $result;
    }

}
