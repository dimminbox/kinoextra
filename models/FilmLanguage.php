<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film_language".
 *
 * @property integer $id
 * @property integer $id_lang
 * @property string $name
 * @property string $title
 * @property string $short
 * @property string $description
 * @property string $country
 * @property string $director
 * @property string $actor
 * @property string $video
 * @property string $videoMoonWalk
 * @property string $kinoPoiskId
 * @property string $meta_description
 * @property string $style
 * @property string $trailer
 * @property string $trailerMoeVideo
 */
class FilmLanguage extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'film_language';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['id', 'id_lang', 'name', 'title', 'short', 'description', 'country', 'director', 'actor', 'videoMoonWalk', 'kinoPoiskId', 'meta_description', 'style', 'trailer', 'trailerMoeVideo'], 'required'],
                [['id', 'id_lang'], 'integer'],
                [['short', 'description', 'actor', 'video', 'videoMoonWalk', 'trailer', 'trailerMoeVideo'], 'string'],
                [['name'], 'string', 'max' => 100],
                [['title'], 'string', 'max' => 200],
                [['country', 'meta_description'], 'string', 'max' => 512],
                [['director', 'kinoPoiskId', 'style'], 'string', 'max' => 255],
        ];
    }

    public function getName() {
        return $this->name;
    }

    public function getDirector() {
        return $this->director;
    }

    public function getActor() {
        return $this->actor;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getShortDesc() {
        return $this->short;
    }

    public function getTrailer() {
        return $this->trailer;
    }

    public function getVideo() {
        return $this->video;
    }

    public function getLongDesc() {
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_lang' => 'Id Lang',
            'name' => 'Name',
            'title' => 'Title',
            'short' => 'Short',
            'description' => 'Description',
            'country' => 'Country',
            'director' => 'Director',
            'actor' => 'Actor',
            'video' => 'Video',
            'videoMoonWalk' => 'Video Moon Walk',
            'kinoPoiskId' => 'Kino Poisk ID',
            'meta_description' => 'Meta Description',
            'style' => 'Style',
            'trailer' => 'Trailer',
            'trailerMoeVideo' => 'Trailer Moe Video',
        ];
    }

    /**
     * @inheritdoc
     * @return FilmLanguageQuery the active query used by this AR class.
     */
    public static function find() {
        return new FilmLanguageQuery(get_called_class());
    }

}
