<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filmtogenre".
 *
 * @property integer $id_film
 * @property integer $id_genre
 */
class Filmtogenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filmtogenre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_film', 'id_genre'], 'required'],
            [['id_film', 'id_genre'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_film' => 'Id Film',
            'id_genre' => 'Id Genre',
        ];
    }

    /**
     * @inheritdoc
     * @return FilmtogenreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmtogenreQuery(get_called_class());
    }
}
