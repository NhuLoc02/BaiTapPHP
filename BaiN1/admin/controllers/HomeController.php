<?php
require '../carbon/autoload.php';
require_once 'config/config.php';
use Carbon\Carbon;

class DashboardController
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getDashboardData()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->subdays(-1)->toDateString();
        $subdays = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $query_order = mysqli_query($this->mysqli, "SELECT * FROM orders WHERE order_date BETWEEN '$subdays' AND '$now'");
        $order_count = mysqli_num_rows($query_order);

        $sql_sales = "SELECT * FROM orders WHERE order_date BETWEEN '$subdays' AND '$now'";
        $query_sales = mysqli_query($this->mysqli, $sql_sales);
        $sales = 0;
        while ($order = mysqli_fetch_array($query_sales)) {
            $sales += $order['total_amount'];
        }

        $query_product = mysqli_query($this->mysqli, "SELECT * FROM product WHERE product_status = 1 ");
        $product_count = mysqli_num_rows($query_product);

        $query_customer = mysqli_query($this->mysqli, "SELECT * FROM customer");
        $customer_count = mysqli_num_rows($query_customer);

        $sql_order_metric = "SELECT * FROM orders WHERE order_date BETWEEN '$subdays' AND '$now'";
        $query_metric = mysqli_query($this->mysqli, $sql_order_metric);

        $order_live = 0;
        $order_online = 0;
        $order_cancel = 0;

        while ($val = mysqli_fetch_array($query_metric)) {
            if ($val['order_type'] == 5) {
                $order_live++;
            } elseif ($val['order_type'] == 4 || $val['order_type'] == 1 || $val['order_type'] == 2 || $val['order_type'] == 3) {
                $order_online++;
            }
            if ($val['order_status'] == -1) {
                $order_cancel++;
            }
        }

        $data = [
            'orderCount' => $order_count,
            'sales' => $sales,
            'productCount' => $product_count,
            'customerCount' => $customer_count,
            'orderLive' => $order_live,
            'orderOnline' => $order_online,
            'orderCancel' => $order_cancel
        ];
        
        require_once 'views/Home.php';
    }
}

$controller = new DashboardController($mysqli);
$controller->getDashboardData();
?>
