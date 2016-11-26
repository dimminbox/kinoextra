<?php
namespace app\widgets\PopularFilms;

use yii\bootstrap\Widget;
use app\models\Film;
use Yii;

class PopularFilms extends Widget
{

    public $limit = 5;
    public function run()
    {
        parent::run();

        $films = Film::find()->andWhere(['active'=>1])->joinWith(['lang'])->orderBy('visited DESC')->limit($this->limit)->all();
        
        if (empty($films)) return '';
        
        return $this->render('view',['films'=>$films]);
    }

}
