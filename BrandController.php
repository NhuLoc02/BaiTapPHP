<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './models/BrandModel.php';
$brandModel = new BrandModel($mysqli);
class BrandController
{
    private $brand_id;
    private $brand_name;

    public function __construct($brand_id = null, $brand_name = null) {
        $this->brand_id = $brand_id;
        $this->brand_name = $brand_name;

    }

    public function brandList($brandModel)
    {
        $brands = $brandModel->getBrand();
        require_once './views/BrandListView.php';
    }

    public function brandEdit($brandId, $brandName, $brandModel)
    {
        $brandModel->editBrand($brandId, $brandName);
        header('Location: ../../index.php?action=brand&query=brand_list');
        exit();
    }
}


// ...
$action = isset($_GET['action']) ? $_GET['action'] : null;
$brandId = isset($_GET['brand_id']) ? $_GET['brand_id'] : null; // Add this line to fetch the brand_id
$brandName = isset($_POST['brand_name']) ? $_POST['brand_name'] : null;
$brandController = new BrandController($brandId, '');

switch ($action) {
    case 'brand_add':
        // Handle creation of a new
        break;
    case 'brand_edit':
        if ($brandId) {
            $brandController->brandEdit($brandId, $brandName, $brandModel); // Pass $brandModel as an argument
        } else {
            // Show error or redirect to appropriate error page
        }
        break;
    default:
        $brandController->brandList($brandModel); // Pass $brandModel as an argument
        break;
}
