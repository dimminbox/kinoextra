<?php

namespace app\widgets\Poll;

use yii\bootstrap\Widget;
use app\models\EstimationFilm;
use Yii;

class Poll extends Widget {

    public $number = 10;
    public $model;

    public function run() {
        parent::run();

        $estimations = EstimationFilm::find()->andWhere(['model_id'=>$this->model])->all();
        $count = count($estimations);
        $totalEstimate = 0;
        foreach ($estimations as $estimate) {
            $totalEstimate += $estimate->estimate;
        }
        
        $vari = '{n} голос|{n} голоса|{n} голосов|{n} голоса';
        $arr = explode('|', $vari);
        $count = $count . '';
        $termination = $count[strlen($count) - 1];
        
        switch ($termination) {
            case (($count >= 11) && ($count <= 14)): {
                    $count = preg_replace('/\{n\}/', $count, $arr[2]);
                    break;
                }
            case ($termination == 1): {
                    $count = preg_replace('/\{n\}/', $count, $arr[0]);
                    break;
                }
            case (($termination >= 2) && ($termination <= 4)): {
                    $count = preg_replace('/\{n\}/', $count, $arr[1]);
                    break;
                }
            case (($termination >= 5) || ($termination == 0)): {
                    $count = preg_replace('/\{n\}/', $count, $arr[2]);
                    break;
                }
            default:
                $count = 0;
        }

        return $this->render('view', array(
            'model_id' => $this->model,
            'count' => $count,
            'estimate' => round(($count != 0) ? $totalEstimate / $count : 0, 3),
            'number' => $this->number));
    }

}
