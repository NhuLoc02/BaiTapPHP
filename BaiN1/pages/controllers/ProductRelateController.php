<?php
require './pages/models/ProductRelateModel.php';
class ProductController {
    private $productModel;
    private $productView;

    public function __construct($productModel, $productView) {
        $this->productModel = $productModel;
        $this->productView = $productView;
    }

    public function showProductList() {
        $productList = $this->productModel->getProductList();
        $evaluateRatings = [];

        while ($row = mysqli_fetch_array($productList)) {
            $evaluateRatings[$row['product_id']] = $this->productModel->getEvaluateRating($row['product_id']);
        }

        $this->productView->renderProductList($productList, $evaluateRatings);
        require './pages/views/productRelateView.php';
    }
}
$productController = new ProductController($productModel, $productView);
$productModel = new Product($mysqli);
$productController->showProductList();
$productView = new ProductView();
