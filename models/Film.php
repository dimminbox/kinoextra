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
class Film extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'visited', 'rating', 'url', 'sort'], 'required'],
            [['year', 'visited', 'rating', 'active', 'sort'], 'integer'],
            [['data_modified', 'data_created'], 'safe'],
            [['image'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 512],
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
    public static function find()
    {
        return new FilmQuery(get_called_class());
    }
}
