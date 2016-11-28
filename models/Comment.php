<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $film_id
 * @property string $date_modified
 * @property string $user
 * @property integer $rating
 * @property integer $active
 * @property string $ip
 */
class Comment extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['content', 'film_id', 'rating', 'active', 'ip'], 'required'],
                [['content'], 'string'],
                [['film_id', 'rating', 'active'], 'integer'],
                [['date_modified'], 'safe'],
                [['user', 'ip'], 'string', 'max' => 256],
        ];
    }
    public function getAuthor() {
        return $this->user;
    }
    public function getText() {
        return $this->content;
    }

    public function getFilm() {
        return $this->hasOne(Film::className(), ['id' => 'film_id'])->andWhere(['film.active' => 1]);
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'film_id' => 'Film ID',
            'date_modified' => 'Date Modified',
            'user' => 'User',
            'rating' => 'Rating',
            'active' => 'Active',
            'ip' => 'Ip',
        ];
    }

    /**
     * @inheritdoc
     * @return CommentQuery the active query used by this AR class.
     */
    public static function find() {
        return new CommentQuery(get_called_class());
    }

}
