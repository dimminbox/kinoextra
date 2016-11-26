<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "director".
 *
 * @property integer $id
 * @property string $image
 * @property string $name
 * @property string $description
 * @property string $date_added
 * @property string $date_modified
 */
class Director extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'director';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['date_added', 'date_modified'], 'safe'],
            [['image', 'name'], 'string', 'max' => 512],
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
            'name' => 'Name',
            'description' => 'Description',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * @inheritdoc
     * @return DirectorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DirectorQuery(get_called_class());
    }
}
