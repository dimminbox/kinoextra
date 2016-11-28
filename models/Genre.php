<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $meta_description
 * @property string $data_modified
 * @property string $url
 * @property integer $active
 * @property string $meta_keywords
 * @property integer $parent
 */
class Genre extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'genre';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name', 'title', 'meta_description', 'url', 'active', 'parent'], 'required'],
                [['data_modified'], 'safe'],
                [['active', 'parent'], 'integer'],
                [['meta_keywords'], 'string'],
                [['name', 'url'], 'string', 'max' => 255],
                [['title'], 'string', 'max' => 200],
                [['meta_description'], 'string', 'max' => 215],
        ];
    }

    public function getName() {
        return $this->name;
    }

    public function getUrl() {
        return "/".$this->url;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getMetaDescription() {
        return $this->meta_description;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'meta_description' => 'Meta Description',
            'data_modified' => 'Data Modified',
            'url' => 'Url',
            'active' => 'Active',
            'meta_keywords' => 'Meta Keywords',
            'parent' => 'Parent',
        ];
    }

    /**
     * @inheritdoc
     * @return GenreQuery the active query used by this AR class.
     */
    public static function find() {
        return new GenreQuery(get_called_class());
    }

}
