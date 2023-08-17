<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);



require_once 'config/config.php';
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
    public function getBrandById($brandId) {
        $sql_brand_edit = "SELECT * FROM brand WHERE brand_id = '$brandId' LIMIT 1 ";
        $query_brand_edit = mysqli_query($this->mysqli, $sql_brand_edit);

        $brands = mysqli_fetch_assoc($query_brand_edit);

        return $brands;
    }
    

    public function addBrand($brandName)
    {
        $sql_add_brand = "INSERT INTO brand (brand_name) VALUES ('$brandName')";
        mysqli_query($this->mysqli, $sql_add_brand);
       
    }

    public function editBrand($brandId, $brandName)
    {    
       
            
        $sqlUpdate = "UPDATE brand SET brand_name = '$brandName' WHERE brand_id = '$brandId'";
        mysqli_query($this->mysqli, $sqlUpdate);
        
        
    }
    public function deleteBrand($brandId){
  
        $sql_delete_brand = "DELETE FROM brand WHERE brand_id = $brandId";
        mysqli_query($this->mysqli, $sql_delete_brand);
    }
 }
 $brandModel = new BrandModel($mysqli);