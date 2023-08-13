<?php
require_once './models/ProductModel.php';
$productModel = new ProductModel($mysqli);
class ProductController 
{
    private $product_id;
    private $brand_id;
    private $category_id;
    private $capacity_id;
  
    public function __construct($product_id = null,$brand_id = null,$category_id = null,$capacity_id = null) 
    {
    
        $this ->product_id = $product_id;
        $this ->brand_id = $brand_id;
        $this ->category_id = $category_id;
        $this ->capacity_id = $capacity_id;
    }

    public function productList($productModel) {
        if (isset($_GET['pagenumber'])) {
            $page = $_GET['pagenumber'];
        } else {
            $page = '1';
        }

        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page * 10) - 10;
        }

        $products = $productModel ->getProduct();
        require_once './views/ProductListView.php';  
    }
    public function editProduct()
    {
        global $productModel;
 
            $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
            $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : null;
            $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
            $capacity_id = isset($_GET['capacity_id']) ? $_GET['capacity_id'] : null;

            $products = $productModel->getProductId($product_id);
            $brands = $productModel->getBrand($brand_id);
            $category = $productModel->getCategory($category_id);
            $capacity = $productModel->getCapacity($capacity_id);
        require_once './views/ProductEditView.php';
    }       
}
$productController = new ProductController();

?>
