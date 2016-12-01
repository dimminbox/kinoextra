<?php

namespace app\controllers;

use Yii;
use app\models\Actor;
use app\models\Film;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ActorController extends CController {

    public function actionIndex($page=0) {

        $actors = Actor::find()->with(['film'])->orderBy('name DESC');
        $pages = new \yii\data\Pagination(['totalCount' => $actors->count(), 'pageSize' => 15, 'defaultPageSize' => 15]);
        $pages->pageSizeParam = false;
        $pages->forcePageParam = false;
        $pages->urlManager = new \app\components\CustomUrlManager;

        $dataProvider = new ActiveDataProvider([
            'query' => $actors,
            'pagination' => $pages
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($url) {

        $actor = Actor::find()->with(['film'])->andWhere(['url' => $url])->one();
        $films = [];
        $styles = '';
        $genres = '';
        $comments = 0;
        $visites = 0;

        $filmIds = array();
        foreach ($actor->film as $film) {
            $filmIds[] = $film->id;
        }

        $stylesTemp = '';
        $genresTemp = '';
        $_films = Film::find()->with(['style', 'lang', 'comment', 'genre'])->andWhere(['id' => $filmIds])->all();
        foreach ($_films as $film) {

            $visites += $film->getVisited();
            $comments += $film->getCountComments();
            $stylesTemp = ($stylesTemp != '') ? $stylesTemp . ', ' . $film->getStyleHuman() : $film->getStyleHuman();
            $genresTemp = ($genresTemp != '') ? $genresTemp . ', ' . $film->getGenreHuman() : $film->getGenreHuman();
        }

        CController::$metaTitle = (isset(Yii::$app->params['_seo_actor_page_title'])) ? Yii::$app->params['_seo_actor_page_title'] : '';
        CController::$metaTitle = $actor->getName() . CController::$metaTitle;

        CController::$metaDescription = (isset(Yii::$app->params['_seo_actor_page_description'])) ? Yii::$app->params['_seo_actor_page_description'] : '';
        CController::$metaDescription = $actor->getDescription() . CController::$metaDescription;

        return $this->render('view', [
                    'actor' => $actor,
                    'films' => $_films,
                    'styles' => $stylesTemp,
                    'genres' => $genresTemp,
                    'visites' => $visites,
                    'comments' => $comments
        ]);
    }

}

?>
