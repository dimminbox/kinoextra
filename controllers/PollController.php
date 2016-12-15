<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;
use app\models\EstimationFilm;

class PollController extends CController {

    /**
     * @inheritdoc
     */
    public function actionAdd() {


        //if (Yii::app()->request->isAjaxRequest) {

        if ((isset($_GET['filmId'])) && ($_GET['estimate'])) {

            $filmId = strip_tags($_GET['filmId']);
            $estimate = strip_tags($_GET['estimate']);

            if (Yii::$app->request->cookies->getValue('poll' . $filmId)=='') {

                $model = new EstimationFilm;
                $model->estimate = $estimate;
                $model->model_id = $filmId;
                $model->key = md5(uniqid(rand(), 1));
                $model->ip = Yii::$app->request->userIP;

                if ($model->save()) {

                    Yii::$app->response->cookies->add(new Cookie([
                        'name' => 'poll' . $filmId,
                        'value' => md5(uniqid(rand(), 1)),
                        'domain' => $_SERVER['HTTP_HOST'],
                        'expire' => time() + 86400,
                    ]));
                    return $this->renderPartial('view',['filmId'=>$filmId, 'stars'=>false]);
                } else {
                    return $this->renderPartial('view',['filmId'=>$filmId]);
                }
            } else
                echo 'Вы уже оценили этот фильм.';
        } else
            throw new CException(Yii::t('DimmPoll', 'Estimation is null'));
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionResults() {
        $count = Estimation::instance('estimation_film')->count(array('condition' => 'model_id=' . $model));
        $model = Estimation::instance('estimation_film')->find(array('select' => array('sum(estimate) as estimate'), 'condition' => 'model_id=' . $model));
        $estimate = $model->estimate;
        $mes = new CPhpMessageSource();
        $mes->basePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'messages';
        $mes->language = 'en_us';
        $vari = $mes->translate('main', '{n} estimate|{n} estimates');
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
        $viewFile = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'Result.php';
        return $this->controller->renderFile($viewFile, array('count' => $count, 'estimate' => round($estimate / $count, 3)));
    }

}
