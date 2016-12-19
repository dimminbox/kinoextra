<?php
namespace app\widgets\MainStyle;

use yii\bootstrap\Widget;
use app\models\Style;
use Yii;

class MainStyle extends Widget
{
    public $style;
    public $limit = 5;
    public function run()
    {
        parent::run();
        
        $stylesParent = Style::find()->andWhere(['parent'=>0])->orderBy('sort DESC')->all();
        if ($this->style!='') {
            $style = Style::find()->andWhere(['url'=>$this->style])->one();
            if (!empty($style))
            $styles = Style::find()->andWhere(['parent'=>$style->id])->orderBy('sort DESC')->all();
        }
        $styles = (!empty($styles)) ? $styles : $stylesParent;
        
        if (empty($styles)) return '';
        
        return $this->render('view',['styles'=>$styles]);
    }

}
