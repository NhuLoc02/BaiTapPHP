<?php
require_once 'config/config.php';

class ProductModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getProduct() {
        $sql_product_list = "SELECT product.product_id, product.product_name, product.product_image, evaluate.evaluate_rate, product.product_status, product.product_price, product.product_sale, product.product_price_import FROM product INNER JOIN evaluate on product.product_id = evaluate.product_id WHERE product.product_id LIMIT 10 ";

        $query_product_list = $this->mysqli->query($sql_product_list);
        $products = array();
        
        while ($row = $query_product_list->fetch_assoc()) {
            $products[] = $row;
        }
        
        return $products;
        }
    public function getProductList($page = 1, $category_id = null)
        {
           $perPage= 4;
           $begin= ($page -1)* $perPage;

           $condition='';
           if($category_id !==null) {
            $condition= "WHERE product_category= $category_id";
           }
           $sql= "SELECT * FROM product $condition ORDER BY product_id DESC LIMIT $begin, $perPage";
           $query= mysqli_query($this->mysqli, $sql);
           return mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
    public function getTotalPages($category_id= null)
    {
        $condition='';
        if ($category_id !==null) {
            $condition ="WHERE product_category= $category_id";
        }
        $perPage= 4; $page=1;
        $begin= ($page -1)* $perPage;
        $sql= "SELECT COUNT(*) as total FROM product $condition ORDER BY product_id DESC LIMIT $begin, $perPage";
        $result= $this->mysqli->query($sql);
        $row= $result->fetch_assoc();
        return ceil($row['total']/4);
    }
    public function getProductID($product_id)
    {
        $sql_product_id = "SELECT * FROM product WHERE product_id = '$_GET[product_id]' LIMIT 1 ";     
        $query = $this->mysqli->query($sql_product_id);
        $products = array();
        while ($row = $query->fetch_assoc()){
            $products[] = $row;
        }     
        return $products;    
    }
    public function getBrand($brand_id)
    {
        $sql_brand_id = "SELECT * FROM brand  ORDER BY brand_id DESC ";     
        $query = $this->mysqli->query($sql_brand_id);
        $brands = array();
        while ($row_brand = $query->fetch_assoc()){
            $brands[] = $row_brand;
        } 
        return $brands;    
    }
    public function getCapacity($capacity_id)
    {
        $sql_capacity_id = "SELECT * FROM capacity ORDER BY capacity_id ASC ";     
        $query = $this->mysqli->query($sql_capacity_id);
        $capacity = array();
        while ($row_capacity = $query->fetch_assoc()){
            $capacity[] = $row_capacity;
        } 
        return $capacity;    
    }
    public function getCategory($category_id)
    {
        $sql_category_id = "SELECT * FROM category ORDER BY category_id DESC ";     
        $query = $this->mysqli->query($sql_category_id);
        $category = array();
        while ($row_category = $query->fetch_assoc()){
            $category[] = $row_category;
        } 
        return $category;    
    }
    public function editProduct($product_id, $product_name, $brand_id, $category_id, $capacity_id, $product_price, $product_price_import, $product_status, $product_sale, $product_description, $brand_name, $category_name, $capacity_name)
    {    
       
            
        $sqlUpdate = "UPDATE product SET product_name = '$product_name', product_brand= '$brand_name', product_category= '$category_name', capacity_id='$capacity_name', product_price='$product_price', product_price_import= '$product_price_import', product_status= '$product_status', product_sale= '$product_sale', product_description= '$product_description' 
        WHERE product_id = '$product_id'";
        mysqli_query($this->mysqli, $sqlUpdate);
    
    }
    public function deleteProduct($product_id)
    {
        $sql_delete_product = "DELETE FROM product WHERE product_id = $product_id";
        mysqli_query($this->mysqli, $sql_delete_product);
    }
    public function addProducts( $product_name, $brand_id, $category_id, $capacity_id, $product_price, $product_price_import, $product_status, $product_sale, $product_description, $brand_name, $category_name, $capacity_name)
    {
        $sql_add_product= "INSERT INTO product (product_name, product_brand, product_category, capacity_id, product_price, product_price_import, product_status, product_sale, product_description) 
        VALUES ('$product_name', '$brand_name', '$category_name', '$capacity_name', '$product_price', '$product_price_import', '$product_status', '$product_sale', '$product_description') ";
        mysqli_query($this->mysqli, $sql_add_product);
    }


    // Các phương thức hoạt động với cơ sở dữ liệu khác cho model sản phẩm
}
?>