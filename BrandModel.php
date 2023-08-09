<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
class BrandModel
{
    private $mysqli;
    
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
      
    }
    public function getBrand()
    {
        $sql_brand_list = "SELECT * FROM brand ORDER BY brand_id DESC";
        $query_brand_list = mysqli_query($this->mysqli, $sql_brand_list);

        $brands = array();
        while ($row = mysqli_fetch_array($query_brand_list)) {
            $brands[] = $row;
        }
        return $brands;
        
    }
    public function editBrand($brandId, $brandName)
    {
        $sql_edit_brand = "SELECT * FROM brand WHERE brand_id = '$brandId' LIMIT 1";
        $query_edit_brand = $this->db->query($sql_edit_brand);

        $brands = [];
        while ($row = $query_edit_brand->fetch_assoc()) {
            $brand = new BrandController($row['brand_id'], $row['brand_name']);
            $brands[] = $brand;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_edit'])) {
            $brandName = $_POST['brand_name'];
            $sqlUpdate = "UPDATE brand SET brand_name='$brandName' WHERE brand_id='$brandId'";

            $this->db->query($sqlUpdate);
            header('Location: ../../index.php?action=brand&query=brand_list');
            exit();
        }
}
}
$brandModel = new BrandModel($mysqli);

$brands = $brandModel->getBrand();
