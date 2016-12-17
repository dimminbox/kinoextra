<?php
namespace app\widgets\Social;

use yii\bootstrap\Widget;
use Yii;

class Social extends Widget {

public function run() {
parent::run();

print <<<EOD
<script src = "//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,lj,viber,whatsapp,skype,telegram"></div> 
EOD;

}

}
