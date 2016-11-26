<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Countrytogenre]].
 *
 * @see Countrytogenre
 */
class CountrytogenreQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Countrytogenre[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Countrytogenre|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
