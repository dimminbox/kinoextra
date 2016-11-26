<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FilmLanguage]].
 *
 * @see FilmLanguage
 */
class FilmLanguageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FilmLanguage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FilmLanguage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
