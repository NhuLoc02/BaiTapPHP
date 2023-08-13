<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
require_once './models/OrderModel.php';
$orderModel = new OrderModel($mysqli);
class OrderController {
    private $order_id;
    private $order_code;
    private $order_date;
    private $account_name;
    private $order_type;
    private $order_status;
    private $model;

    public function __construct() {
        $this->model = new OrderModel($GLOBALS['mysqli']);
      
    }
    public function orderList($orderModel) {

        $orders = $orderModel ->getOrder();
        require_once './views/OrderListView.php';
        
        
    }

public function getOrderDetail() { 
    global $orderModel;
    if(isset($_GET['order_code'])) {
        $orderCode = $_GET['order_code'];
        
        $orderDetails = $orderModel->getOrderDetail();
        require_once './views/OrderDetailView.php'; // Replace this with the actual path to your view file
    }
 }

}
    // Các phương thức khác cho controller quản lý sản phẩm
   
$action = isset($_GET['action']) ? $_GET['action'] : null;
$orderId = isset($_GET['order_id']) ? $_GET['order_id'] : null; // Add this line to fetch the brand_id
$orderCode = isset($_POST['order_code']) ? $_POST['order_code'] : null;
$orderDate = isset($_POST['order_date']) ? $_POST['order_date'] : null;
$accountName = isset($_POST['account_name']) ? $_POST['account_name'] : null;
$orderType = isset($_POST['order_type']) ? $_POST['order_type'] : null;
$orderStatus = isset($_POST['order_status']) ? $_POST['order_status'] : null;
$orderController = new OrderController();


?>
