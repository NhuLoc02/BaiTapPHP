<?php
$mysqli = new mysqli('localhost', 'root', '', 'test');



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
            // $query_evaluate_rating = "SELECT evaluate_rate FROM evaluate WHERE product_id='" . $row['product_id'] . "' AND evaluate_status = 1";
            
            // $query_product_list_rating = $this->mysqli->query($query_evaluate_rating);
            // $products_rate = array();
            // while ($row_rate = $query_product_list_rating -> fetch_assoc()){
            //     $products_rate[] = $row_rate;
            // }
            // return $products_rate;
            $products[] = $row;
        }
        
        return $products;
        }
    public function getCount() {
        $sql = "SELECT COUNT(*) FROM product";
        $query = mysqli_query($this->mysqli, $sql);
        $row = mysqli_fetch_array($query);
        return $row[0];
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
        $sql_brand_id = "SELECT * FROM brand ORDER BY brand_id DESC ";     
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
    

    // Các phương thức hoạt động với cơ sở dữ liệu khác cho model sản phẩm
}
?>
