<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estimation".
 *
 * @property integer $id
 * @property string $key
 * @property integer $estimate
 * @property string $ip
 * @property string $date
 */
class Estimation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estimation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'key', 'estimate'], 'required'],
            [['id', 'estimate'], 'integer'],
            [['date'], 'safe'],
            [['key'], 'string', 'max' => 50],
            [['ip'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'estimate' => 'Estimate',
            'ip' => 'Ip',
            'date' => 'Date',
        ];
    }

    /**
     * @inheritdoc
     * @return EstimationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstimationQuery(get_called_class());
    }
}
