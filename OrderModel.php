<?php

$mysqli = new mysqli('localhost', 'root', '', 'dbtest');

class OrderModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getOrder() {
        $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status  ORDER BY orders.order_id  ";
        $query_order_list = $this->mysqli->query($sql_order_list);

       
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

    // public function getOrderDetail() {
    //     $sql_order = "SELECT * FROM orders JOIN delivery ON orders.delivery_id = delivery.delivery_id WHERE orders.order_code  ORDER BY orders.order_id DESC";
    //     mysqli_query($this->mysqli, $sql_order);
        
    // }
    public function getOrderDetail($order_code) {
        $sql = "SELECT * FROM orders WHERE order_code = '$order_code' LIMIT 1";
        $query = mysqli_query($this->mysqli, $sql);
        return mysqli_fetch_array($query);
    }

    public function getOrderDetails($order_code) {
        $sql = "SELECT od.order_detail_id, p.product_id, p.product_name, od.product_quantity, od.product_price, od.product_sale, p.product_image FROM order_detail od JOIN product p ON od.product_id = p.product_id WHERE od.order_code = '$order_code' ORDER BY od.order_detail_id DESC";
        $query = mysqli_query($this->mysqli, $sql);
        return $query;
    }

    public function getOrderWithDelivery($order_code) {
        $sql = "SELECT * FROM orders JOIN delivery ON orders.delivery_id = delivery.delivery_id WHERE orders.order_code = '$order_code' ORDER BY orders.order_id DESC";
        $query = mysqli_query($this->mysqli, $sql);
        return $query;
    }

}
?>
