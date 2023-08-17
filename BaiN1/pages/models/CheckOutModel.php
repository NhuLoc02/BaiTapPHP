<?php
require_once './admin/config/config.php';
class CustomerModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getCustomerByAccountId($account_id) {
        $sql_customer = "SELECT * FROM customer WHERE account_id = '$account_id'";
        $query_account = mysqli_query($this->mysqli, $sql_customer);
        $customer = mysqli_fetch_assoc($query_account);
        $number_customer = mysqli_num_rows($query_account);
        return $customer;
    }
}
?>
