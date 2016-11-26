<?php
namespace app\widgets\MainStyle;

use yii\bootstrap\Widget;
use app\models\Style;
use Yii;

class MainStyle extends Widget
{

    public $limit = 5;
    public function run()
    {
        parent::run();

        $styles = Style::find()->andWhere(['main'=>1])->orderBy('sort DESC')->all();
        
        if (empty($styles)) return '';
        
        return $this->render('view',['styles'=>$styles]);
    }

}
