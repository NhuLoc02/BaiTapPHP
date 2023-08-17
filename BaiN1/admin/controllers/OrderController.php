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
    public function orderList() {
        global $orderModel;
        $orders = $orderModel ->getOrder();
        require_once './views/OrderListView.php';
        
        
    }

public function getOrderDetail() { 
    global $orderModel;
    $order_code = $_GET['order_code'];
    $delivery_id = isset($_GET['delivery_id']) ? $_GET['delivery_id'] : null;
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

    $getByIds = $orderModel->getById($order_code);
    $orderDetails = $orderModel->getOrderdetail($delivery_id);
    $productDetails = $orderModel->getProductDetail($product_id);

    require_once './views/OrderDetailView.php';
}

public function getOrderHisDetail() { 
    global $orderModel;
    $order_code = $_GET['order_code'];
    $delivery_id = isset($_GET['delivery_id']) ? $_GET['delivery_id'] : null;
    $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

    $getByIds = $orderModel->getById();
    $orderDetails = $orderModel->getOrderdetail();
    $productDetails = $orderModel->getProductDetail();

    require_once './views/OrderHisDetailView.php';
}

public function printOrder() { 

}
public function orderHistory() { 
    global $orderModel;
    $payment_id = isset($_GET['payment_id']) ? $_GET['payment_id'] : null;

    $orderHistory = $orderModel->getOrderHistory();
    require_once './views/OrderHistoryView.php';
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