<?php
$mysqli = new mysqli("localhost", "root", "", "dbtest");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

require_once './models/ArticleModel.php';

class ArticleController
{
    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel($GLOBALS['mysqli']);
    }

    public function articleList()
    {
        $articles = $this->model->getArticles();
        require './views/ArticleListView.php';
    }

    public function addArticle()
    {
        $article = [
            'article_author' => '',
            'article_title' => '',
            'article_summary' => '',
            'article_content'=> '',
            'article_image'=> '',
            'article_date'=> '',
            'article_status'=> ''
        ];
        $insertIntoArticle= $this->model->addArticle($article);

    }

    public function editArticle($articleId)
    {
        $updateQuery = $this->model->editArticle();
        require './views/ArticleEditView.php';
    }

    public function showArticleEditForm($articleId)
    {
        $article = $this->model->getArticle($articleId);
        $comments = $this->model->getComments($articleId);

        require './views/ArticleEditView.php';
    }
    public function deleteArticle($articleId)
    {
        $this->model->deleteArticle($articleId);
    }
} 


$articleController = new ArticleController();

$articleId = isset($_GET['article_id']) ? $_GET['article_id'] : null;
$author = isset($_POST['article_author']) ? $_POST['article_author'] : null;
$title = isset($_POST['article_title']) ? $_POST['article_title'] : null;
$summary = isset($_POST['article_summary']) ? $_POST['article_summary'] : null;
$content = isset($_POST['article_content']) ? $_POST['article_content'] : null;
$image = isset($_FILES['article_image']['name']) ? $_FILES['article_image']['name'] : null;
$status = isset($_POST['article_status']) ? $_POST['article_status'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleController->editArticle($articleId, $author, $title, $summary, $content, $image, $status);
} else {
    $articleController->articleList();
}