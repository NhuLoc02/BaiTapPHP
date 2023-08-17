<?php

require_once 'pages/models/ProductBannerModel.php';

class ProductBannerController {
    private $model;

    public function __construct($mysqli) {
        $this->model = new ProductBannerModel($mysqli); // Instantiate the ProductModel
    }

    public function showProductBanner($category_id = null, $brand_id = null) {
        $category = null;
        $categories = null;

        if ($category_id) {
            $category = $this->model->getCategoryById($category_id);
        } elseif ($brand_id) {
            $categories = $this->model->getBrandById($brand_id);
        }
        require_once 'pages/views/ProductBannerView.php';
    }
}

$controller = new ProductBannerController($mysqli); // Instantiate the controller

if (isset($_GET['category_id'])) {
    $controller->showProductBanner($_GET['category_id']);
} elseif (isset($_GET['brand_id'])) {
    $controller->showProductBanner(null, $_GET['brand_id']);
} else {
    $controller->showProductBanner();
}
?>
