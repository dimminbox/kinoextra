<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Filmtogenre]].
 *
 * @see Filmtogenre
 */
class FilmtogenreQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Filmtogenre[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Filmtogenre|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
