<?php
require_once './models/ProductModel.php';
$productModel = new ProductModel($mysqli);
class ProductController 
{
    private $product_id;
    private $product_name;
    private $brand_id;
    private $category_id;
    private $capacity_id;
    private $product_price;
    private $product_price_import;
    private $product_status;
    private $product_sale;
    private $product_description;
    private $brand_name;
    private $category_name;
    private $capacity_name;
  
    public function __construct($product_id = null, $product_name= null, $brand_id = null,$category_id = null,$capacity_id = null, $product_price= null, $product_price_import= null, $product_status= null,$product_sale= null,$product_description= null, $brand_name = null,$category_name = null,$capacity_name = null) 
    {
    
        $this ->product_id = $product_id;
        $this ->product_name = $product_name;
        $this ->brand_id = $brand_id;
        $this ->category_id = $category_id;
        $this ->capacity_id = $capacity_id;
        $this ->product_price = $product_price;
        $this ->product_price_import = $product_price_import;
        $this ->product_status = $product_status;
        $this ->product_sale = $product_sale;
        $this ->product_description = $product_description;
        $this ->brand_name = $brand_name;
        $this ->category_name = $category_name;
        $this ->capacity_name = $capacity_name;

    }

    public function showProducts($page=1, $category_id= null) {
        if (isset($_GET['category_id'])) {
            $category_id= $_GET['category_id'];
        } else {
            $category_id= null;
        }
        $page= isset($_GET['pagenumber']) ? $_GET['pagenumber'] : 1;
        global $productModel;
        $products= $productModel->getProductList($page, $category_id);
        $totalPages= $productModel->getTotalPages($category_id);
        require_once './views/ProductListView.php';  
    }
    public function editProduct()
    {
        global $productModel;
        if (isset($_GET['product_id']))
        {
            $product_id= $_GET['product_id'];
            $products = $productModel->getProductID($product_id);
            $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : null;
            $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
            $capacity_id = isset($_GET['capacity_id']) ? $_GET['capacity_id'] : null;

            $brands = $productModel->getBrand($brand_id);
            $category = $productModel->getCategory($category_id);
            $capacity = $productModel->getCapacity($capacity_id);
            if (isset($_POST['product_edit'])) {
               $product_name= $_POST['product_name'];
               $brand_name= $_POST['product_brand'];
               $category_name= $_POST['product_category'];
               $capacity_name= $_POST['product_capacity'];
               $product_price= $_POST['product_price'];
               $product_price_import= $_POST['product_price_import'];
               $product_status= $_POST['product_status'];
               $product_sale= $_POST['product_sale'];
               $product_description= $_POST['product_description'];
               $productModel->editProduct($product_id, $product_name, $brand_id, $category_id, $capacity_id, $product_price, $product_price_import, $product_status, $product_sale, $product_description, $brand_name, $category_name, $capacity_name);
               echo "<script>window.location.href = '../../BaiN1/admin/index.php?action=product&query=product_list';</script>";

            }
        }
 
            // $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
            // $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : null;
            // $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
            // $capacity_id = isset($_GET['capacity_id']) ? $_GET['capacity_id'] : null;

            // $products = $productModel->getProductId($product_id);
            // $brands = $productModel->getBrand($brand_id);
            // $category = $productModel->getCategory($category_id);
            // $capacity = $productModel->getCapacity($capacity_id);
        require_once './views/ProductEditView.php';
    }    
    public function deleteProduct($product_id)
    {
        global $productModel;
        $productModel->deleteProduct($product_id);
        echo "<script>window.location.href = '../../BaiN1/admin/index.php?action=product&query=product_list';</script>";
    }  
    public function addProducts()
    {   
        global $productModel;
        $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : null;
        $brands = $productModel->getBrand($brand_id);
        global $productModel;
        if (isset($_POST['product_add'])) {
            $product_name= $_POST['product_name'];
            $brand_name= $_POST['product_brand'];
            $category_name= $_POST['product_category'];
            $capacity_name= $_POST['product_capacity'];
            $product_price= $_POST['product_price'];
            $product_price_import= $_POST['product_price_import'];
            $product_status= $_POST['product_status'];
            $product_sale= $_POST['product_sale'];
            $product_description= $_POST['product_description'];
            $productModel->addProducts($product_name, $product_price, $product_price_import, $product_status, $product_sale, $product_description, $brand_name, $category_name, $capacity_name);
            echo "<script>window.location.href = '../../BaiN1/admin/index.php?action=product&query=product_list';</script>";
        }
        require_once './views/ProductAddView.php';
    } 
}
$productController = new ProductController();

?>