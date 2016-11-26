<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countrytogenre".
 *
 * @property integer $id
 * @property integer $idCounytry
 * @property integer $idGenre
 * @property string $title
 * @property string $metaDescription
 * @property string $H1
 * @property integer $active
 * @property string $date_added
 * @property string $date_modified
 */
class Countrytogenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countrytogenre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCounytry', 'idGenre', 'title', 'metaDescription', 'H1', 'active', 'date_modified'], 'required'],
            [['idCounytry', 'idGenre', 'active'], 'integer'],
            [['metaDescription'], 'string'],
            [['date_added', 'date_modified'], 'safe'],
            [['title', 'H1'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCounytry' => 'Id Counytry',
            'idGenre' => 'Id Genre',
            'title' => 'Title',
            'metaDescription' => 'Meta Description',
            'H1' => 'H1',
            'active' => 'Active',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @inheritdoc
     * @return CountrytogenreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountrytogenreQuery(get_called_class());
    }
}
