<?php

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
    // public function addArticle ($article)
    // {
    //     $article=[];
    //     $sql= "insert into article(article_id, article_author, article_title, article_summary, article_content, article_image, article_date, article_status) values";
    //     $valueStrings= array();
    //     foreach ($article as $row) {
    //         $values= implode(",", array_map(function($value){
    //             return "'".$this->conn->real_escape_string($value)."'";
    //         }, $row));
    //         $valueStrings[]="({$value})";
    //     }
    //     $sql.= implode(",", $valueStrings);
    //     if (!empty($valueStrings)) {
    //         $result= $this->conn->query($sql);
    //         if ($result) {
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    //     return false;
    // }
    public function deleteArticle($articleId)
    {
        $sql_delete_article = "DELETE FROM article WHERE article_id = $articleId";
        mysqli_query($this->mysqli, $sql_delete_article);
    }
    // public function editArticle($articleId, $author, $title, $summary, $content, $image, $status)
    // {
    //     if (empty($articleId)) {
    //         return false;
    //     }
        
    //     $articleId = $this->mysqli->real_escape_string($articleId);
    //     $author = $this->mysqli->real_escape_string($author);
    //     $title = $this->mysqli->real_escape_string($title);
    //     $summary = $this->mysqli->real_escape_string($summary);
    //     $content = $this->mysqli->real_escape_string($content);
    //     $image = time() . '_' . $this->mysqli->real_escape_string($image);
    //     $date = date('Y-m-d', time());
    //     $status = $this->mysqli->real_escape_string($status);
    
    //     $oldImageQuery = $this->mysqli->query("SELECT article_image FROM article WHERE article_id = '$articleId' LIMIT 1");
    
    //     if ($oldImageQuery->num_rows > 0) {
    //         $oldImageRow = $oldImageQuery->fetch_assoc();
    //         $oldImagePath = 'uploads/' . $oldImageRow['article_image'];
    //         if (file_exists($oldImagePath)) {
    //             unlink($oldImagePath);
    //         }
    //     }
    
    //     if (isset($_FILES['article_image']) && $_FILES['article_image']['error'] === UPLOAD_ERR_OK) {
    //         $tempImagePath = $_FILES['article_image']['tmp_name'];
    //         $targetImagePath = 'uploads/' . $image;
    //         move_uploaded_file($tempImagePath, $targetImagePath);
    //     }
    
    //     $stmt = $this->mysqli->prepare("UPDATE article SET article_author=?, article_title=?, article_summary=?, article_content=?, article_image=?, article_date=?, article_status=? WHERE article_id=?");
    //     $stmt->bind_param("sssssssi", $author, $title, $summary, $content, $image, $date, $status, $articleId);
    //     $updateQuery = $stmt->execute();
        
    //     $stmt->close();
    
    //     return $updateQuery;
    // }
}