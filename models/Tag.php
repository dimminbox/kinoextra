<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tag".
 *
 * @property string $name
 * @property string $url
 * @property integer $id
 * @property string $date_added
 * @property integer $active
 * @property integer $weight
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'active', 'weight'], 'required'],
            [['date_added'], 'safe'],
            [['active', 'weight'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'url' => 'Url',
            'id' => 'ID',
            'date_added' => 'Date Added',
            'active' => 'Active',
            'weight' => 'Weight',
        ];
    }

    /**
     * @inheritdoc
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }
}
