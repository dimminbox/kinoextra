<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "best_films".
 *
 * @property integer $id
 * @property string $image
 * @property string $year
 * @property string $url
 * @property integer $visited
 * @property double $rating
 */
class BestFilms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'best_films';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'image', 'year', 'url', 'visited', 'rating'], 'required'],
            [['id', 'visited'], 'integer'],
            [['rating'], 'number'],
            [['image', 'year', 'url'], 'string', 'max' => 512],
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
            'url' => 'Url',
            'visited' => 'Visited',
            'rating' => 'Rating',
        ];
    }

    /**
     * @inheritdoc
     * @return BestFilmsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BestFilmsQuery(get_called_class());
    }
}
