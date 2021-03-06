<?php

namespace app\controllers;

use Yii;
use app\models\Film;
use app\models\Tag;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FilmController implements the CRUD actions for Film model.
 */
class FilmController extends CController {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionBest() {
    
        CController::$metaTitle = (isset(Yii::$app->params['_seo_best_title'])) ? Yii::$app->params['_seo_best_title'] : '';
        CController::$metaDescription = (isset(Yii::$app->params['_seo_best_description'])) ? Yii::$app->params['_seo_best_description'] : '';
        CController::$h1 = CController::$metaTitle;
        CController::$description = CController::$metaDescription;

        $films = \app\models\BestFilms::find()->joinWith(['style', 'lang', 'comment'])
                        ->orderBy('rating DESC')->groupBy('best_films.id')->limit(50)->distinct();

        $dataProvider = new ActiveDataProvider([
            'query' => $films,
            'pagination' => false
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'best' => true
        ]);
    }

    public function actionIndex($url = '', $page = 0, $genre = '', $year = 0, $country = '', $tag = '') {


        $films = Film::find()->andWhere(['film.active' => 1])->joinWith(['style', 'lang', 'comment'])
                        ->orderBy('film.sort DESC, film.data_created DESC')->groupBy('film.id')->distinct();

        if ($tag != '') {
            $films->joinWith(['tag']);
            $films->andWhere(['Tag.url' => $tag, 'Tag.active' => 1]);
        }
        if ($url != '') {
            CController::$style = $url;
            $films->andWhere(['style.url' => $url]);
        }
        if ($genre != '') {
            $films->joinWith(['genre']);
            $films->andWhere(['genre.url' => $genre]);
        }
        if ($year != 0)
            $films->andWhere(['year' => $year]);

        if ($country != '') {
            $films->joinWith(['country']);
            $films->andWhere(['country.url' => $country, 'country.active' => 1]);
        }

        $pages = new \yii\data\Pagination(['totalCount' => $films->count(), 'pageSize' => 15, 'defaultPageSize' => 15]);
        $pages->pageSizeParam = false;
        $pages->forcePageParam = false;
        $pages->urlManager = new \app\components\CustomUrlManager;

        $dataProvider = new ActiveDataProvider([
            'query' => $films,
            'pagination' => $pages
        ]);

        if ($tag != '') {
            $curTag = \app\models\Tag::find()->andWhere(['url' => $tag])->one();
            CController::$metaTitle = (isset(Yii::$app->params['_seo_tag_title'])) ? str_replace('{tag}', $curTag->getName(), Yii::$app->params['_seo_tag_title']) : '';
            CController::$h1 = CController::$metaTitle;
            CController::$metaDescription = (isset(Yii::$app->params['_seo_tag_description'])) ? str_replace('{tag}', $curTag->getName(), Yii::$app->params['_seo_tag_description']) : '';
            CController::$description = CController::$metaDescription;
        } elseif ($country != '') {
            $curCountry = \app\models\Country::find()->andWhere(['url' => $country])->one();
            CController::$h1 = 'Фильмы и сериалы производства "' . $curCountry->getName() . '"';
            CController::$metaTitle = $curCountry->getTitle();
            CController::$metaDescription = $curCountry->getMetaDescription();
            CController::$description = CController::$metaDescription;
        } elseif ($year != '') {
            CController::$metaTitle = (isset(Yii::$app->params['_seo_year_title'])) ? str_replace('{year}', $year, Yii::$app->params['_seo_year_title']) : '';
            CController::$metaDescription = (isset(Yii::$app->params['_seo_year_description'])) ? str_replace('{year}', $year, Yii::$app->params['_seo_year_description']) : '';
            CController::$h1 = CController::$metaTitle;
            CController::$description = CController::$metaDescription;
        } elseif ($genre != '') {
            $curGenre = \app\models\Genre::find()->andWhere(['url' => $genre])->one();
            CController::$h1 = $curGenre->getName();
            CController::$metaTitle = $curGenre->getTitle();
            CController::$metaDescription = $curGenre->getMetaDescription();
            CController::$description = CController::$metaDescription;
        } elseif ($url == '') {

            CController::$metaTitle = Yii::$app->params['_seo_main_title'];
            CController::$h1 = Yii::$app->params['_seo_main_title'];
            CController::$metaDescription = Yii::$app->params['_seo_main_description'];
            CController::$description = Yii::$app->params['_seo_main_description'];
        } else {
            $curStyle = \app\models\Style::find()->andWhere(['url' => $url])->one();
            CController::$h1 = $curStyle->getName();
            CController::$metaTitle = $curStyle->getTitle();
            CController::$metaDescription = $curStyle->getMetaDescription();
            CController::$description = CController::$metaDescription;
        }
        if ($page != 0) {
            CController::$metaTitle = CController::$metaTitle . " страница $page";
            CController::$metaDescription = CController::$metaDescription . " страница $page";
        }


        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'best' => false
        ]);
    }

    public function actionTags() {

        CController::$metaTitle = (isset(Yii::$app->params['_seo_tag_title'])) ? Yii::$app->params['_seo_tag_title'] : '';
        CController::$metaDescription = (isset(Yii::$app->params['_seo_tag_description'])) ? Yii::$app->params['_seo_tag_description'] : '';
        CController::$h1 = 'Фильмы по интересам';

        $abc = array();
        $alphafit = array();
        foreach (range(chr(0xC0), chr(0xDF)) as $b)
            $abc[] = iconv('CP1251', 'UTF-8', $b);

        $_tags = \app\models\Tag::find()->orderBy('weight DESC, name ASC')->andWhere(['active' => 1])->all();

        foreach ($_tags as $tag) {
            $first = str_split($tag->getName(), 2);
            $alphafit[$first[0]][] = $tag;
        }

        ksort($alphafit);
        

        return $this->render('tags', [
                    'alphavit' => $alphafit,
        ]);
    }

    public function actionCountries() {

        CController::$metaTitle = (isset(Yii::$app->params['_seo_country_title'])) ? Yii::$app->params['_seo_country_title'] : '';
        CController::$metaDescription = (isset(Yii::$app->params['_seo_country_description'])) ? Yii::$app->params['_seo_country_description'] : '';
        CController::$h1 = 'Фильмы по странам';

        $abc = array();
        $alphafit = array();
        foreach (range(chr(0xC0), chr(0xDF)) as $b)
            $abc[] = iconv('CP1251', 'UTF-8', $b);

        $_countries = \app\models\Country::find()->orderBy('country.name ASC')->andWhere(['country.active' => 1])->all();

        foreach ($_countries as $country) {
            $first = str_split($country->getName(), 2);
            $_country = array('name' => $country->getName(), 'url' => $country->getUrl());
            $alphafit[$first[0]][] = $_country;
        }

        ksort($alphafit);


        return $this->render('countries', [
                    'alphavit' => $alphafit,
        ]);
    }

    public function actionView($url) {
        $tags = [];
        $genres = [];
        $film = Film::find()->joinWith(['style', 'genre', 'lang'])->
                andWhere(['film.url' => $url, 'film.active' => 1, 'style.active' => 1])
                ->one();
        if (empty($film))
            throw new \yii\web\NotFoundHttpException("Фильм не доступен. Возможно он удалён по просьбе правообладателей.");

        if (!empty($film->genre))
            $genres = $film->genre;

        $tags = Tag::find()->joinwith(['film'])->andWhere(['idFilm' => $film->id])->all();

        CController::$metaTitle = $film->getTitle();
        CController::$metaDescription = $film->getMetaDescription();

        return $this->render('view', [
                    'model' => $film,
                    'tags' => $tags,
                    'genres' => $genres,
        ]);
    }

}
