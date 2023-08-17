<?php
require_once './pages/models/BlogModel.php';
$blogModel = new BlogModel($mysqli);
class BlogController
{
    public function __construct() {
       
    }

    public function getBlog($blogModel)
    {
        $blog = $blogModel->getBlog();
        include("./pages/views/BlogView.php");
       
    }
}
?>