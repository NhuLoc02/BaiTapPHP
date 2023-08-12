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
       
    public function editBrand() {
        global $brandModel;
        if (isset($_GET['brand_id'])) {
            $brandId = $_GET['brand_id'];
            $data = $brandModel->getBrandById($brandId); // Truyền brandId vào phương thức getBrandById()
    
            if (isset($_POST['brand_edit'])) {
                $brandName = $_POST['brand_name'];
                $brandModel->editBrand($brandId, $brandName);
                echo "<script>window.location.href = '../../demo/index.php?action=brand&query=brand_list';</script>";
            }
    
            require_once './views/BrandEditView.php';
        }
    }
        



// ...
}
$brandId = isset($_GET['brand_id']) ? $_GET['brand_id'] : null; // Add this line to fetch the brand_id
$brandName = isset($_POST['brand_name']) ? $_POST['brand_name'] : null;
$brandController = new BrandController($brandId, $brandName, $brandModel);
