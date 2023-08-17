<?php
require_once './admin/config/config.php';


$article_id = $_GET['article_id'];
$controller->showArticle($article_id);
class ArticleModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getArticle($article_id) {
        $sql = "SELECT * FROM article WHERE article_id = $article_id LIMIT 1";
        $query = mysqli_query($this->mysqli, $sql);
        return mysqli_fetch_array($query);
    }

    public function getComments($article_id) {
        $sql = "SELECT * FROM comment WHERE article_id = '$article_id' AND comment_status = 1";
        $query = mysqli_query($this->mysqli, $sql);
        return $query;
    }
}
?>
