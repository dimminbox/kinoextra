<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Filmtodirector]].
 *
 * @see Filmtodirector
 */
class FilmtodirectorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Filmtodirector[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Filmtodirector|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
