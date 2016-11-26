<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filmtocountry".
 *
 * @property integer $id_country
 * @property integer $id_film
 * @property string $date_added
 * @property string $date_modified
 * @property integer $active
 */
class Filmtocountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filmtocountry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_country', 'id_film'], 'required'],
            [['id_country', 'id_film', 'active'], 'integer'],
            [['date_added', 'date_modified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_country' => 'Id Country',
            'id_film' => 'Id Film',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return FilmtocountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmtocountryQuery(get_called_class());
    }
}
