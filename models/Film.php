<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film".
 *
 * @property integer $id
 * @property string $image
 * @property integer $year
 * @property string $data_modified
 * @property string $data_created
 * @property integer $visited
 * @property integer $rating
 * @property integer $active
 * @property string $url
 * @property integer $sort
 */
class Film extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'film';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['image', 'visited', 'rating', 'url', 'sort'], 'required'],
                [['year', 'visited', 'rating', 'active', 'sort'], 'integer'],
                [['data_modified', 'data_created'], 'safe'],
                [['image'], 'string', 'max' => 50],
                [['url'], 'string', 'max' => 512],
        ];
    }

    public function getStyle() {
        return $this->hasMany(Style::className(), ['id' => 'id_style'])->viaTable('filmtostyle', ['id_film' => 'id']);
    }
    public function getGenre() {
        return $this->hasMany(Genre::className(), ['id' => 'id_genre'])->viaTable('filmtogenre', ['id_film' => 'id']);
    }

    public function getComment() {
        return $this->hasMany(Comment::className(), ['film_id' => 'id']);
    }

    public function getStyleHuman() {
        
        $result = '';
        if (empty($this->style)) return '';
        
        foreach ($this->style as $style) {
            $result[] = $style->getName();
        }
        return implode(', ',$result);
    }

    public function getCountComments() {
        return count($this->comment);
    }

    public function getCountry() {
        return $this->getLangPart()->getCountry();
    }

    public function getShortDesc() {
        return $this->getLangPart()->getShortDesc();
    }

    public function getLongDesc() {
        return $this->getLangPart()->getLongDesc();
    }

    public function getLang() {
        return $this->hasOne(FilmLanguage::className(), ['id' => 'id'])->andWhere(['{{film_language}}.id_lang' => Yii::$app->params['langID']]);
    }

    public function getDirector() {
        return $this->getLangPart()->getDirector();
    }

    public function getUrl() {
        $url = '/film/' . $this->url;
        return $url;
    }

    public function getYear() {
        return $this->year;
    }

    public function getVisited() {
        return $this->visited;
    }

    public function getImage() {
        return 'http://kinoextra.com/images/film/' . $this->image;
    }

    public function getAlt() {
        return 'Фильм ' . $this->getName();
    }

    public function getName() {
        return $this->getLangPart()->getName();
    }

    public function getLangPart() {
        if (isset($this->lang))
            return $this->lang;
        else
            return new FilmLanguage();
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'year' => 'Year',
            'data_modified' => 'Data Modified',
            'data_created' => 'Data Created',
            'visited' => 'Visited',
            'rating' => 'Rating',
            'active' => 'Active',
            'url' => 'Url',
            'sort' => 'Sort',
        ];
    }

    /**
     * @inheritdoc
     * @return FilmQuery the active query used by this AR class.
     */
    public static function find() {
        return new FilmQuery(get_called_class());
    }

}
