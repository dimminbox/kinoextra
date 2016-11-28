<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estimation_film".
 *
 * @property integer $id
 * @property string $key
 * @property integer $estimate
 * @property string $ip
 * @property string $date
 * @property integer $model_id
 */
class EstimationFilm extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'estimation_film';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['key', 'estimate', 'model_id'], 'required'],
                [['estimate', 'model_id'], 'integer'],
                [['date'], 'safe'],
                [['key'], 'string', 'max' => 50],
                [['ip'], 'string', 'max' => 15],
        ];
    }

    public function getFilm() {
        return $this->hasOne(Film::className(), ['id' => 'model_id'])->andWhere(['film.active' => 1]);
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'estimate' => 'Estimate',
            'ip' => 'Ip',
            'date' => 'Date',
            'model_id' => 'Model ID',
        ];
    }

}
