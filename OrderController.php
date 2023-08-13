<?php
// ini_set('display_errors', 1);
// ini_set('error_reporting', E_ALL);

$mysqli = new mysqli("host", "username", "password", "database");

require_once 'OrderDetailView.php';
require_once 'OrderDetailController.php';

$model = new OrderDetailModel($mysqli);

$controller = new OrderDetailController($model, $view);

$order_code = $_GET['order_code'];
$controller->handleOrderActions();
$controller->showOrderDetail($order_code);
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
    private $view;

    public function __construct($model) {
        $this->model = $model;
      
    }
    public function orderList($orderModel) {

        $orders = $orderModel ->getOrder();
        require_once './views/OrderListView.php';

        
    }

//     public function orderDetail($orderDetailModel) {
//         global $orderModel;
//         if (isset($_POST['order_code'])) {
//             $orderCode = $_POST['order_code'];
//             $data = $orderModel->getOrderById($orderCode); // Truyền brandId vào phương thức getBrandById()
    
//         //     if (isset($_POST['brand_edit'])) {
//         //         $brandName = $_POST['brand_name'];
//         //         $brandModel->editBrand($brandId, $brandName);
//         // require_once './views/OrderDetailView.php';
//     }
// }
// }
public function orderDetail() { 
    global $orderModel; 
    if (isset($_GET['order_id']) ) {
        $oderID = $_GET['order_id'];
        $orderCode = $_POST['order_code']; 
        $orderDate = $_POST['order_date'];
    $data = $orderModel->getOrderDetail($orderCode, $orderDate);
    
    
    // Continue with the rest of the code...
    }
    require_once './views/OrderDetailView.php';
 }
 public function showOrderDetail($order_code) {
    $order = $this->model->getOrderDetail($order_code);
    $orderDetails = $this->model->getOrderDetails($order_code);
    $total = $order['total_amount'];

    $this->view->renderOrderDetail($order, $orderDetails, $total);
    require_once './views/OrderDetailView.php';
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
$orderController = new OrderController($orderId, '', $orderModel);


?>
