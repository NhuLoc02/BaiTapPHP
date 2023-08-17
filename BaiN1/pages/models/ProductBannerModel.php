<?php
require_once './admin/config/config.php';
class ProductBannerModel {
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }
    public function getCategoryById($category_id) {
        $sql = "SELECT * FROM category WHERE category_id = '$category_id' LIMIT 1";
        $query = mysqli_query($this->mysqli, $sql);
        $category = array();
        while ($row = $query->fetch_assoc()) {
            $category[] = $row;
        }
        return $category;
    }

    public function getBrandById($brand_id) {
        $sql = "SELECT * FROM brand WHERE brand_id = '$brand_id' LIMIT 1";
        $query = mysqli_query($this->mysqli, $sql);
        $brand = array();
        while ($row = $query->fetch_assoc()) {
            $brand[] = $row;
        }
        return $brand;
    }
}

$productBannerModel = new ProductBannerModel($mysqli);

?>