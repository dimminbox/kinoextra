<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $image
 * @property string $description
 * @property string $name
 * @property string $url
 * @property string $title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $date_added
 * @property string $date_modified
 * @property integer $active
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'name'], 'string'],
            [['name', 'url', 'title', 'meta_description', 'active'], 'required'],
            [['date_added', 'date_modified'], 'safe'],
            [['active'], 'integer'],
            [['image', 'url', 'meta_description', 'meta_keywords'], 'string', 'max' => 512],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'description' => 'Description',
            'name' => 'Name',
            'url' => 'Url',
            'title' => 'Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'active' => 'Active',
        ];
    }

     public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getMetaDescription() {
        return $this->meta_description;
    }
    
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
