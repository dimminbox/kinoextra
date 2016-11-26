<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filmtostyle".
 *
 * @property integer $id_film
 * @property integer $id_style
 */
class Filmtostyle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filmtostyle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_film', 'id_style'], 'required'],
            [['id_film', 'id_style'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_film' => 'Id Film',
            'id_style' => 'Id Style',
        ];
    }

    /**
     * @inheritdoc
     * @return FilmtostyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FilmtostyleQuery(get_called_class());
    }
}
