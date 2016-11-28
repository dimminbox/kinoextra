<?php

namespace app\widgets\LastComments;

use yii\bootstrap\Widget;
use app\models\Comment;
use Yii;

class LastComments extends Widget {

    public $limit = 5;

    public function run() {
        parent::run();

        $comments = Comment::find()->andWhere(['comment.active' => 1])->joinWith(['film.lang'])->orderBy('date_modified DESC')->limit($this->limit)->all();

        return $this->render('view', ['comments' => $comments]);
    }

}
