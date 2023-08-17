<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
require_once 'config/config.php';

class CustomerModel
{
    private $mysqli;
    
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }
    
    public function getCustomer()
    {
        // if (isset($_GET['pagenumber'])) {
        //     $page = $_GET['pagenumber'];
        // } else {
        //     $page = '1';
        // }

        // if ($page == '' || $page == 1) {
        //     $begin = 0;
        // } else {
        //     $begin = ($page * 10) - 10;
        // }

        $sql_customer_list = "SELECT * FROM customer ORDER BY customer_id DESC";
        $query_customer_list = mysqli_query($this->mysqli, $sql_customer_list);
        $customers = array();
        while ($row = mysqli_fetch_array($query_customer_list)) {
            $customers[] = $row;
        }
        return $customers;
    }
    public function deleteCustomer($customerId)
    {
        $sql_delete_customer = "DELETE FROM customer WHERE customer_id = '$customerId'";
        mysqli_query($this->mysqli, $sql_delete_customer);
    }
}

?>