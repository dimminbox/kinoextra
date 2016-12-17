<?php

namespace spanjeta\comments;

use spanjeta\comments\models\Comment;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * This is just an example.
 */
class CommentsWidget extends \yii\base\Widget {

    public $disabled = false;

    /**
     *
     * @var Model
     */
    public $model;
    public $readOnly = false;

    protected function getRecentComments() {

        if ($this->model == null)
            return null;
        $query = Comment::find()->andWhere([
                    'film_id' => $this->model->id,
                    'active' => 1
                ])->orderBy('date_modified DESC');
        return new ActiveDataProvider(['query' => $query]);
    }

    protected function formModel() {
        
        if (isset($_GET['commentId'])) {
            $commentId = (int)$_GET['commentId'];
            $commentReply = Comment::find()->andWhere(['id'=>$commentId])->one();
            if (!empty($commentReply)) {
                $comment = new Comment();
                $comment->rating = 5;
                $comment->film_id = $this->model->id;
                $comment->content = $commentReply->user.', ';
                return $comment;
            }
        }
        
        $comment = new Comment();
        $comment->film_id = $this->model->id;
        $comment->rating = 5;
        return $comment;
    }

    public function run() {
        if ($this->disabled)
            return; //Do nothing

        if ((isset($_POST['Comment'])) && ($_POST['g-recaptcha-response'] != '')) {

            $user = strip_tags($_POST['Comment']['user']);
            $commentText = strip_tags($_POST['Comment']['content']);
            $rating = strip_tags($_POST['Comment']['rating']);
            if (($user == $_POST['Comment']['user']) && ($commentText == $_POST['Comment']['content'])) {
                $comment = new Comment();
                $comment->user = $user;
                $comment->content = $commentText;
                $comment->rating = $rating;
                $comment->film_id = $this->model->id;
                $comment->active = 1;
                $comment->save();
            }
            $this->view->context->redirect(Yii::$app->request->url);
        }

        echo $this->render('comments', [
            'comments' => $this->getRecentComments(),
            'model' => $this->formModel()
        ]);
    }

}
