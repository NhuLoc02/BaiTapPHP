<?php
require_once './admin/config/config.php';
class BlogModel 
{
    private $mysqli;

    public function __construct($mysqli) 
    {
        $this->mysqli = $mysqli;
    }

    public function getBlog() {
        $sql_blog = "SELECT * FROM article WHERE article_status = 1 ORDER BY article_id DESC";
        $query_blog = $this->mysqli->query($sql_blog);

        $blog = array();
        while ($row = $query_blog->fetch_assoc()) {
            $blog[] = $row;
        }
        return $blog;
    }
}
?>

