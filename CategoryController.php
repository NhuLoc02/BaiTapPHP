<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './models/CategoryModel.php';
$categoryModel = new CategoryModel($mysqli);
class CategoryController
{
    private $category_id;
    private $category_name;
    private $category_image;
    private $category_description;

    public function __construct($category_id = null, $category_name = null, $category_image = null, $category_description = null) {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
        $this->category_image = $category_image;
        $this->category_description = $category_description;
    }

    public function categoryList($categoryModel)
    {
        $categories = $categoryModel->getCategory();
        require_once './views/CategoryListView.php';
    }
    // public function deleteCategory($categoryId)
    // {
    //     $this->model->deleteCategory($categoryId);
    // }
} 


$action = isset($_GET['action']) ? $_GET['action'] : null;
$categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : null; // Add this line to fetch the brand_id
$categoryName = isset($_POST['category_name']) ? $_POST['category_name'] : null;
$categoryImage = isset($_POST['category_image']) ? $_POST['category_image'] : null;
$categoryDescription = isset($_POST['category_description']) ? $_POST['category_description'] : null;
$categoryController = new categoryController($categoryId, '');

switch ($action) {
    case 'category_add':
        // Handle creation of a new
        break;
    case 'category_edit':
        if ($categoryId) {
            $categoryController->categoryEdit($categoryId, $categoryName, $categoryImage, $categoryDescription, $categoryModel); // Pass $brandModel as an argument
        } else {
            // Show error or redirect to appropriate error page
        }
        break;
    default:
        $categoryController->categoryList($categoryModel); // Pass $brandModel as an argument
        break;
}