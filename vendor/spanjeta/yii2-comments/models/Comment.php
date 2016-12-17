<?php

/**
 * Company: ToXSL Technologies Pvt. Ltd. < www.toxsl.com >
 * Author : Shiv Charan Panjeta < shiv@toxsl.com >
 */

namespace spanjeta\comments\models;

use Yii;
use yii\components;
use yii\db\ActiveRecord;
use app\models\User;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property integer $id
 * @property string $model_type
 * @property integer $model_id
 * @property string $comment
 * @property integer $state_id
 * @property string $create_time
 * @property integer $create_user_id
 */
class Comment extends ActiveRecord {

    public $reCaptcha;

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_ARCHIEVED = 2;

    public static function getStateOptions($id = null) {
        $list = array(
            self::STATUS_DRAFT => "Draft",
            self::STATUS_PUBLISHED => "Published",
            self::STATUS_ARCHIEVED => "Archieved",
        );
        if ($id == null)
            return $list;
        if (is_numeric($id))
            return $list [$id % count($list)];
        return $id;
    }

      public function getStyle() {
        switch ($this->rating){
            case 1:
                return "background-color:#D9B7FF;";
                
            case 2:
                return "background-color:#BFB9FF;";
                
           case 3:
                return "background-color:#B7E5FF;";
               
           case 4:
                return "background-color:#BBF8FF;";
               
           case 5:
                return "background-color:#FDFFB3;";
               
           case 6:
                return "background-color:#FFE5B3;";
               
           case 7:
                return "background-color:#FFD8B3;";
               
           case 8:
                return "background-color:#D6FFD2;";
               
           case 9:
                return "background-color:#D7FFCC;";
               
           case 10:
                return "background-color:#BDFFBA;";
        }
    }
    
    public function getStateBadge() {
        $list = array(
            self::STATUS_DRAFT => "default",
            self::STATUS_PUBLISHED => "success",
            self::STATUS_ARCHIEVED => "danger",
        );
        return \yii\helpers\Html::tag('span', self::getStateOptions($this->state_id), ['class' => 'label label-' . $list[$this->state_id]]);
    }

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
                [['film_id', 'content', 'user','rating'], 'required'],
                [['film_id','rating'], 'integer'],
                [['content'], 'string'],
                [['date_modified'], 'safe'],
                [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6Ld1ZQ4UAAAAABODriGGAkl7YC5KCQMbZtHldEx6']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'film_id' => Yii::t('app', 'Model ID'),
            'content' => Yii::t('app', 'Комментарий:'),
            'state_id' => Yii::t('app', 'State ID'),
            'create_time' => Yii::t('app', 'Create Time'),
            'user' => Yii::t('app', 'Ваше имя:'),
            'rating' => 'Рейтинг',
        ];
    }

    public static function getRelations() {
        $relations = [];
        return $relations;
    }

}
