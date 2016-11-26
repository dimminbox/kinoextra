<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TagFilm]].
 *
 * @see TagFilm
 */
class TagFilmQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TagFilm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TagFilm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
