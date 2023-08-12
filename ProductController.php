<?php
require_once './models/ProductModel.php';
$productModel = new ProductModel($mysqli);
class ProductController {
    public $ahihi;
    private $model;

    public function __construct() {
        $this->model = new ProductModel($GLOBALS['mysqli']);
        
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

    // Các phương thức khác cho controller quản lý sản phẩm
    public function deleteProduct($productId)
    {
        $this->model->deleteProduct($productId);
    }
}

$productController = new ProductController();

?>
