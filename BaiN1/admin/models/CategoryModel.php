<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
require_once 'config/config.php';
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
    public function getCategoryById($categoryId)
    {
        $sql_category_edit= "SELECT * FROM category WHERE category_id= '$categoryId' LIMIT 1 ";
        $query_category_edit= mysqli_query($this->mysqli, $sql_category_edit);

        $categories= mysqli_fetch_assoc($query_category_edit);
        return $categories;
    }
    public function editCategory($categoryName)
    {
        $sqlUpdate= "UPDATE category SET category_name = '$categoryName' WHERE category_id= '$categoryId'";
        mysqli_query($this->mysqli, $sqlUpdate);
    }
    public function addCategory($categoryName)
    {
        $sql_add_category= "INSERT INTO category (category_name) VALUES ('$categoryName')";
        mysqli_query($this->mysqli, $sql_add_category);
    }
}
// $categoryModel = new CategoryModel($mysqli);

// $categories = $categoryModel->getCategory();