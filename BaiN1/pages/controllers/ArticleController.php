<?php
require './models/ArticleModel.php';
require './views/ArticleView.php';
class ArticleController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function showArticle($article_id) {
        $article = $this->model->getArticle($article_id);
        $comments = $this->model->getComments($article_id);
        $comment_total = mysqli_num_rows($comments);

        $this->view->renderArticle($article);
        $this->view->renderComments($comments, $comment_total);
    }

    public function addComment($article_id, $comment_name, $comment_email, $comment_content) {
        // Handle comment submission logic here
    }
}
$model = new ArticleModel($mysqli);
$view = new ArticleView();
$controller = new ArticleController($model, $view);
?>
