<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
$mysqli = new mysqli("localhost", "root", "", "dbtest");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
class ProductModel
{
    private $mysqli;
    
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
      
    }
    public function getProduct()
    {
        $sql_product_list = "SELECT product.product_id, product.product_name, brand.brand_name, category.category_name, product.product_quantity, product.product_price_import, product.product_price, product.product_sale, product.product_description FROM product 
        join brand on product.product_brand = brand.brand_id 
        join category on product.product_category = category.category_id
        ORDER BY product.product_id DESC";
        $query_product_list = mysqli_query($this->mysqli, $sql_product_list);

        $products = array();
        while ($row = mysqli_fetch_array($query_product_list)) {
            $products[] = $row;
        }
        return $products;
        
    }
    public function deleteProduct()
    {
        $sql_delete_product="delete from product where product_id = $product_id";
        mysqli_query($this->mysqli, $sql_delete_product);
    }
    // public function editBrand($brandId, $brandName)
    // {
    //     $sql_edit_brand = "SELECT * FROM brand WHERE brand_id = '$brandId' LIMIT 1";
    //     $query_edit_brand = $this->db->query($sql_edit_brand);

    //     $brands = [];
    //     while ($row = $query_edit_brand->fetch_assoc()) {
    //         $brand = new BrandController($row['brand_id'], $row['brand_name']);
    //         $brands[] = $brand;
    //     }
        
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['brand_edit'])) {
    //         $brandName = $_POST['brand_name'];
    //         $sqlUpdate = "UPDATE brand SET brand_name='$brandName' WHERE brand_id='$brandId'";

    //         $this->db->query($sqlUpdate);
    //         header('Location: ../../index.php?action=brand&query=brand_list');
    //         exit();
    //     }
// }
}
$productModel = new ProductModel($mysqli);

$products = $productModel->getProduct();
