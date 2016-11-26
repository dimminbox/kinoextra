<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filmtodirector".
 *
 * @property integer $id_director
 * @property integer $id_film
 * @property string $date_added
 * @property string $date_modified
 * @property integer $active
 */
class Filmtodirector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filmtodirector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_director', 'id_film'], 'required'],
            [['id_director', 'id_film', 'active'], 'integer'],
            [['date_added', 'date_modified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_director' => 'Id Director',
            'id_film' => 'Id Film',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return FilmtodirectorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmtodirectorQuery(get_called_class());
    }
}
