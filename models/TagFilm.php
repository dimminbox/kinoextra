<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TagFilm".
 *
 * @property integer $id
 * @property integer $idFilm
 * @property integer $idTag
 * @property integer $active
 */
class TagFilm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TagFilm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFilm', 'idTag', 'active'], 'required'],
            [['idFilm', 'idTag', 'active'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idFilm' => 'Id Film',
            'idTag' => 'Id Tag',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     * @return TagFilmQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagFilmQuery(get_called_class());
    }
}
