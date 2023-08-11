<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './models/BrandModel.php';
$brandModel = new BrandModel($mysqli);
class BrandController
{
    private $brandId;
    private $brandName;

    public function __construct($brandId = null, $brandName = null) {
        $this->brandId = $brandId;
        $this->brandName = $brandName;

    }

    public function brandList($brandModel)
    {
        $brands = $brandModel->getBrand();
        require_once './views/BrandListView.php';
    }


    public function brandEdit($brandId, $brandName, $brandModel)
    {
        $brands = $brandModel->editBrand($brandId, $brandName);
        require_once './views/BrandEditView.php';
        // header('Location: ../../index.php?action=brand&query=brand_list');
        exit();
    }
}


// ...
$action = isset($_GET['action']) ? $_GET['action'] : null;
$brandId = isset($_GET['brand_id']) ? $_GET['brand_id'] : null; // Add this line to fetch the brand_id
$brandName = isset($_POST['brand_name']) ? $_POST['brand_name'] : null;
$brandController = new BrandController($brandId, '', $brandModel);
