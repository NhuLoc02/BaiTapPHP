<?php
// $mysqli = new mysqli('localhost', 'root', '', 'dbtest');

// class OrderModel {
//     private $mysqli;

//     public function __construct($mysqli) {
//         $this->mysqli = $mysqli;
//     }

//     public function getOrder() {
//         if (isset($_GET['order_status'])) {
//             $order_status = $_GET['order_status'];
//             $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status = ? ORDER BY orders.order_id DESC";
//             $stmt = $this->mysqli->prepare($sql_order_list);
//             $stmt->bind_param("i", $order_status);
//             $stmt->execute();
//             $query_order_list = $stmt->get_result();
//         } else {
//             $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status >= 0 AND orders.order_status < 3 ORDER BY orders.order_id DESC";
//             $query_order_list = mysqli_query($this->mysqli, $sql_order_list);
//         }
        
//         $orders = array();
        
//         while ($row = mysqli_fetch_assoc($query_order_list)) {
//             $orders[] = $row;
//         }
        
//         return $orders;

//         // if (isset($_GET['order_status'])) {
//         //     $order_status = $_GET['order_status'];
//         //     $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status = $order_status ORDER BY orders.order_id DESC";
//         //     $query_order_list = mysqli_query($this->mysqli, $sql_order_list);
//         // } else {
//         //     $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status >= 0 AND orders.order_status < 3 ORDER BY orders.order_id DESC";
//         //     $query_order_list = mysqli_query($this->mysqli, $sql_order_list);
//         // }
        
//         // $orders = array();
        
//         // while ($row = mysqli_fetch_assoc($query_order_list)) {
//         //     $orders[] = $row;
//         // }
        
//         // return $orders;
//     }

//     public function getRowCount() {
//         $sql = "SELECT COUNT(*) FROM orders";
//         $query = mysqli_query($this->mysqli, $sql);
//         $row = mysqli_fetch_array($query);
//         return $row[0];
//     }

//     // Các phương thức hoạt động với cơ sở dữ liệu khác cho model sản phẩm
// }

$mysqli = new mysqli('localhost', 'root', '', 'dbtest');

class OrderModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getOrder() {
        $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status  ORDER BY orders.order_id LIMIT 3 ";
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
    // Các phương thức hoạt động với cơ sở dữ liệu khác cho model sản phẩm
}
?>
