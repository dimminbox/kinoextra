<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Filmtostyle]].
 *
 * @see Filmtostyle
 */
class FilmtostyleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Filmtostyle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Filmtostyle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
