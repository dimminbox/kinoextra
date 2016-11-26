<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actor".
 *
 * @property integer $id
 * @property string $image
 * @property string $description
 * @property string $name
 * @property string $date_added
 * @property string $date_modified
 * @property string $url
 */
class Actor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'name'], 'string'],
            [['name', 'url'], 'required'],
            [['date_added', 'date_modified'], 'safe'],
            [['image'], 'string', 'max' => 512],
            [['url'], 'string', 'max' => 255],
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
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'url' => 'Url',
        ];
    }

    /**
     * @inheritdoc
     * @return ActorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActorQuery(get_called_class());
    }
}
