<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './models/ProductModel.php';
$productModel = new ProductModel($mysqli);
class ProductController
{
    private $product_id;
    private $product_name;
    private $brand_name;
    private $category_name;
    private $product_quantity;
    private $product_price_import;
    private $product_price;
    private $product_sale;
    private $product_description;


    public function __construct($product_id = null, $product_name = null, $brand_name = null, $category_name = null, $product_quantity = null, $product_price_import = null, $product_price = null, $product_sale = null, $product_description = null ) {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->brand_name = $brand_name;
        $this->category_name= $category_name;
        $this->product_quantity= $product_quantity;
        $this->product_price_import= $product_price_import;
        $this->product_price= $product_price;
        $this->product_sale= $product_sale;
        $this->product_description= $product_description;

    }

    public function productList($productModel)
    {
        $products = $productModel->getProduct();
        require_once './views/ProductListView.php';
    }

    // public function brandEdit($brandId, $brandName, $brandModel)
    // {
    //     $brandModel->editBrand($brandId, $brandName);
    //     header('Location: ../../index.php?action=brand&query=brand_list');
    //     exit();
    // }
    public function deleteProduct($productId)
    {
        $this->model->deleteProduct($productId);
        
    }
}


// ...
$action = isset($_GET['action']) ? $_GET['action'] : null;
$productId = isset($_GET['product_id']) ? $_GET['product_id'] : null; // Add this line to fetch the product_id
$brandName = isset($_POST['brand_name']) ? $_POST['brand_name'] : null;
$productController = new ProductController($productId, '');

switch ($action) {
    case 'product_add':
        // Handle creation of a new product
        break;
    case 'product_edit':
        if ($productId) {
            $productController->productEdit($productId, $brandName, $productModel); // Pass $productModel as an argument
        } else {
            // Show error or redirect to appropriate error page
        }
        break;
    default:
        $productController->productList($productModel
    ); // Pass $brandModel and $categoryModel as arguments
        break;
}
