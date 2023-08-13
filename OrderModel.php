<?php

$mysqli = new mysqli('localhost', 'root', '', 'dbtest');

class OrderModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getOrder() {
        $mysqli = new mysqli('localhost', 'root', '', 'dbtest');
        if (isset($_GET['order_status'])) {
            $order_status = $_GET['order_status'];
        
            $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status = $order_status ORDER BY orders.order_id DESC LIMIT 10";
            $query_order_list = mysqli_query($mysqli, $sql_order_list);
        } else {
            
            $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status >= 0 AND orders.order_status < 3 ORDER BY orders.order_id DESC LIMIT 10";
            $query_order_list = mysqli_query($mysqli, $sql_order_list);
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
    public function getOrderDetail() {
        $sql_order = "SELECT * FROM orders JOIN delivery ON orders.delivery_id = delivery.delivery_id WHERE orders.order_code  ORDER BY orders.order_id LIMIT 1 ";
        $query_order_detail = mysqli_query($this->mysqli, $sql_order);

        $orders = mysqli_fetch_assoc($query_order_detail);

        return $orders;
    }
   
?>
