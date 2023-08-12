<?php
// ini_set('display_errors', 1);
// ini_set('error_reporting', E_ALL);

// require_once './models/OrderModel.php';
// $orderModel = new OrderModel($mysqli);
// class OrderController {
//     public $hihi;

//     public function __construct() {
//         $this->hihi = new OrderModel($GLOBALS['mysqli']);
//     }

//     public function orderList($orderModel) {
//         if (isset($_GET['pagenumber'])) {
//             $page = $_GET['pagenumber'];
//         } else {
//             $page = '1';
//         }

//         if ($page == '' || $page == 1) {
//             $begin = 0;
//         } else {
//             $begin = ($page * 10) - 10;
//         }
        

//         $orders = $orderModel ->getOrder();
//         require_once './views/OrderListView.php';

        
//     }

//     // Các phương thức khác cho controller quản lý sản phẩm
// }

// $action = isset($_GET['action']) ? $_GET['action'] : null;
// $orderId = isset($_GET['order_id']) ? $_GET['order_id'] : null; // Add this line to fetch the brand_id
// $orderCode = isset($_POST['order_code']) ? $_POST['order_code'] : null;
// $orderDate = isset($_POST['order_date']) ? $_POST['order_date'] : null;
// $accountName = isset($_POST['account_name']) ? $_POST['account_name'] : null;
// $orderType = isset($_POST['order_type']) ? $_POST['order_type'] : null;
// $orderStatus = isset($_POST['order_status']) ? $_POST['customer_status'] : null;
// $orderController = new OrderController();

// switch ($action) {
//     case 'order_export':
//         // Handle creation of a new
//         break;
//     default:
//         $orderController->orderList($orderModel); // Pass $brandModel as an argument
//         break;
// }

require_once './models/OrderModel.php';
$orderModel = new OrderModel($mysqli);
class OrderController {
    public $ahihi;
    private $model;

    public function __construct() {
        $this->model = new OrderModel($GLOBALS['mysqli']);
        
    }

    public function orderList($orderModel) {
        if (isset($_GET['pagenumber'])) {
            $page = $_GET['pagenumber'];
        } else {
            $page = '1';
        }

        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page * 10) - 10;
        }

        $orders = $orderModel ->getOrder();
        require_once './views/OrderListView.php';

        
    }
}

    // Các phương thức khác cho controller quản lý sản phẩm
   

$orderController = new OrderController();

?>