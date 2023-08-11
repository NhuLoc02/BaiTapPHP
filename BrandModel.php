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
        $query_brand_list = $this->mysqli->query($sql_brand_list);

        $brands = array();
        while ($row = $query_brand_list->fetch_assoc()) {
            $brands[] = $row;
        }
        return $brands;
    }

    public function addBrand($brandName)
    {
        $sql_add_brand = "INSERT INTO brand (brand_name) VALUES ('$brandName')";
        $this->mysqli->query($sql_add_brand);
        header('Location: ../../index.php?action=brand&query=brand_list');
    }

    public function editBrand($brandId, $brandName)
    {    
        $sql_edit_brand = "SELECT * FROM brand WHERE brand_id = '$brandId' LIMIT 1";
        $query_edit_brand = $this->mysqli->query($sql_edit_brand);
        $brands = array();
        while ($row = $query_edit_brand->fetch_assoc()) {
            $brands[] = $row;
        }
        
        if (isset($_POST['brand_edit'])) {
        $brandId =  $_GET['brand_id'] ;
        $brandName =  $_POST['brand_name'];
      
        $sqlUpdate = "UPDATE brand SET brand_name = '".$brandName."' WHERE brand_id = $brandId";
        mysqli_query($this->mysqli, $sqlUpdate);
        echo "<script> window.location.href = '../../demo/index.php?action=brand&query=brand_list';</script>";

        
        exit();
        }
    }
}
