<?php
$mysqli = new mysqli('localhost', 'root', '', 'test');



class ProductModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getProduct() {
        $sql_product_list = "SELECT product.product_id, product.product_name, product.product_image, evaluate.evaluate_rate, product.product_status, product.product_price, product.product_sale, product.product_price_import FROM product INNER JOIN evaluate on product.product_id = evaluate.product_id WHERE product.product_id LIMIT 5 ";

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
    public function getRowCount() {
        $sql = "SELECT COUNT(*) FROM product";
        $query = mysqli_query($this->mysqli, $sql);
        $row = mysqli_fetch_array($query);
        return $row[0];
    }
    public function deleteProduct($productId)
    {
        $sql_delete_product = "DELETE FROM product WHERE product_id = $productId";
        mysqli_query($this->mysqli, $sql_delete_product);
    }
    // Các phương thức hoạt động với cơ sở dữ liệu khác cho model sản phẩm
}
?>
