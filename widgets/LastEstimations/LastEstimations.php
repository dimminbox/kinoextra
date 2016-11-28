<?php

namespace app\widgets\LastEstimations;

use yii\bootstrap\Widget;
use app\models\EstimationFilm;
use Yii;

class LastEstimations extends Widget {

    public $limit = 5;

    public function run() {
        parent::run();

        $estimations = EstimationFilm::find()->joinWith(['film.lang'])->orderBy('date DESC')->limit($this->limit)->all();

        return $this->render('view', ['estimations' => $estimations]);
    }

}
