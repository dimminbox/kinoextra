<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Estimation]].
 *
 * @see Estimation
 */
class EstimationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Estimation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Estimation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
