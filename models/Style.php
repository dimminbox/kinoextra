<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "style".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $meta_description
 * @property string $data_modified
 * @property integer $parent
 * @property integer $sort
 * @property string $url
 * @property integer $active
 * @property string $meta_keywords
 */
class Style extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'style';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'meta_description', 'parent', 'sort', 'url', 'active'], 'required'],
            [['data_modified'], 'safe'],
            [['parent', 'sort', 'active'], 'integer'],
            [['meta_keywords'], 'string'],
            [['name', 'url'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 200],
            [['meta_description'], 'string', 'max' => 215],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'meta_description' => 'Meta Description',
            'data_modified' => 'Data Modified',
            'parent' => 'Parent',
            'sort' => 'Sort',
            'url' => 'Url',
            'active' => 'Active',
            'meta_keywords' => 'Meta Keywords',
        ];
    }

    /**
     * @inheritdoc
     * @return StyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StyleQuery(get_called_class());
    }
}
