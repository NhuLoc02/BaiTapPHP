<?php

require_once 'config/config.php';

class OrderModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getOrder() {

        if (isset($_GET['order_status'])) {
           
            $order_status = $_GET['order_status'];
            $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status = '$order_status' ORDER BY orders.order_id DESC LIMIT 10";
            $query_order_list = $this->mysqli->query($sql_order_list);
        } 
        else {
            
            $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status >= 0 AND orders.order_status < 3 ORDER BY orders.order_id DESC LIMIT 10";
            $query_order_list = $this->mysqli->query($sql_order_list);
        }
        $orders = array();
        
        while ($row = $query_order_list->fetch_assoc()) {
         
            $orders[] = $row;
        }
        
        return $orders;
        }
    public function getRowCount() {
        $sql = "SELECT COUNT(*) FROM order";
        $query = mysqli_query($this->mysqli, $sql);
        $row = mysqli_fetch_array($query);
        return $row[0];
    }
    public function getById() {
        $sql_order_id = "SELECT * FROM orders WHERE order_code = '$_GET[order_code]' LIMIT 1 ";     
        $query = $this->mysqli->query($sql_order_id);
        $order = array();
        while ($row = $query->fetch_assoc()){
            $order[] = $row;
        }     
        return $order;   
}
    public function getOrderDetail() {
        $sql_order_detail = "SELECT * FROM orders JOIN delivery ON orders.delivery_id = delivery.delivery_id WHERE orders.order_code = '$_GET[order_code]' ORDER BY orders.order_id DESC";
        $query = $this->mysqli->query($sql_order_detail);
        $orderDetails = array();
        while ($row = $query->fetch_assoc()){
            $orderDetails[] = $row;
        }     
        return $orderDetails;   
}
    public function getProductDetail() {
        $sql_product_detail = "SELECT od.order_detail_id, p.product_id, p.product_name, od.product_quantity, od.product_price, od.product_sale, p.product_image FROM order_detail od JOIN product p ON od.product_id = p.product_id WHERE od.order_code = '$_GET[order_code]' ORDER BY od.order_detail_id DESC";
        $query = $this->mysqli->query($sql_product_detail);
        $productDetails = array();
            while ($row = $query->fetch_assoc()){
            $productDetails[] = $row;
        }     
        return $productDetails;   
}

public function getOrderHistory() {
    if (isset($_GET['payment_type']) && $_GET['payment_type']=='momo') {
        $sql_order_history = "SELECT * FROM momo ORDER BY momo_id DESC LIMIT 5";
    } else {
        $sql_order_history = "SELECT * FROM vnpay ORDER BY vnp_paydate DESC LIMIT 5";
    }
    $query = $this->mysqli->query($sql_order_history);
    $orderHistory = array();
        while ($row = $query->fetch_assoc()){
        $orderHistory[] = $row;
    }     
    return $orderHistory;
}
// other methods in the OrderModel class
}

?>