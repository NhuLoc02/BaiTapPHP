<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$mysqli = new mysqli("localhost", "root", "", "dbtest");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
class ArticleModel
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getArticles()
    {
        $sql_article_list = "SELECT * FROM article ORDER BY article_id DESC";
        $query_article_list = mysqli_query($this->mysqli, $sql_article_list);

        $articles = array();
        while ($row = mysqli_fetch_array($query_article_list)) {
            $articles[] = $row;
        }

        return $articles;
    }
    public function getArticlesID($articleId)
    {
        $sql_article_edit= "SELECT * FROM article WHERE article_id='$articleId' LIMIT 1";
        $query_article_edit= mysqli_query($this->mysqli, $sql_article_edit);
        $articles= mysqli_fetch_assoc($query_article_edit);
        return $articles;
    }
    public function editArticle($articleId, $articleAuthor, $articleTitle, $articleSummary, $articleContent, $articleStatus)
    {
        $sql_article_update="UPDATE article SET article_author='$articleAuthor', article_title='$articleTitle', article_summary='$articleSummary', article_content='$articleContent', article_status='$articleStatus' WHERE article_id='$articleId'";
        mysqli_query($this->mysqli, $sql_article_update);
    }
    public function deleteArticle($articleId)
    {
        $sql_delete_article= "DELETE FROM article WHERE article_id= $articleId";
        mysqli_query($this->mysqli, $sql_delete_article);
    }
    public function addArticle($articleAuthor, $articleTitle, $articleSummary, $articleContent, $articleStatus)
    {
        $sql_article_add= "INSERT INTO article(article_author, article_title, article_summary, article_content, article_status) VALUES ('$articleAuthor', '$articleTitle', '$articleSummary', '$articleContent', '$articleStatus')";
        mysqli_query($this->mysqli, $sql_article_add);
    }
}
$articleModel= new ArticleModel($mysqli);  
