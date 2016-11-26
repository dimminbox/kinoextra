<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BestFilms]].
 *
 * @see BestFilms
 */
class BestFilmsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BestFilms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BestFilms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
