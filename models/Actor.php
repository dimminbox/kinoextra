<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actor".
 *
 * @property integer $id
 * @property string $image
 * @property string $description
 * @property string $name
 * @property string $date_added
 * @property string $date_modified
 * @property string $url
 */
class Actor extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'actor';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['description', 'name'], 'string'],
                [['name', 'url'], 'required'],
                [['date_added', 'date_modified'], 'safe'],
                [['image'], 'string', 'max' => 512],
                [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'description' => 'Description',
            'name' => 'Name',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'url' => 'Url',
        ];
    }

    public function getFilm() {
        return $this->hasMany(Film::className(), ['id' => 'id_film'])->viaTable('filmtoactor', ['id_actor' => 'id']);
    }

    public function getImage($width, $height) {

        $pathResized = '/imageCache/';
        $file = Yii::getAlias('@webroot') . '/images/actors/' . $this->image;
        if ( (!file_exists($file)) || (filesize($file)==0) )
            return '';
        
        $fileCache = Yii::getAlias('@webroot') . $pathResized . $this->image;
        $_name = "{$pathResized}{$width}_{$height}_{$this->image}";

        if (file_exists($_name)) {
            return $_name;
        } else {
            \yii\imagine\Image::thumbnail($file, $width, $height)->save(Yii::getAlias('@webroot') . $_name);
            return $_name;
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getFilmCount() {
        if (isset($this->film))
            return count($this->film);
        else
            return 0;
    }

    public function getUrl() {
        return '/actor/'.$this->url;
    }
    public static function find() {
        return new ActorQuery(get_called_class());
    }

}
