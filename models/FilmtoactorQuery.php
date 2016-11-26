<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Filmtoactor]].
 *
 * @see Filmtoactor
 */
class FilmtoactorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Filmtoactor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Filmtoactor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
