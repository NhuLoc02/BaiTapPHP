<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$mysqli = new mysqli("localhost", "root", "", "dbtest");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
class CategoryModel
{
    private $mysqli;
    
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
      
    }
    public function getCategory()
    {
        $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
        $query_category_list = mysqli_query($this->mysqli, $sql_category_list);

        $categories = array();
        while ($row = mysqli_fetch_array($query_category_list)) {
            $categories[] = $row;
        }
        return $categories;
        
    }
     public function deleteCategory($categoryId)
    {
        $sql_delete_category = "DELETE FROM category WHERE category_id = $categoryId";
        mysqli_query($this->mysqli, $sql_delete_category);
    }
}
// $categoryModel = new CategoryModel($mysqli);

// $categories = $categoryModel->getCategory();
