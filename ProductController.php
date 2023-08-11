<?php
require_once './models/ProductModel.php';
$productModel = new ProductModel($mysqli);
class ProductController {
    public $ahihi;

    public function __construct() {
        
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
}

$productController = new ProductController();

?>
