<?php
require_once './admin/config/config.php';
class ContactModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function insertContact($customer_name, $customer_phone, $customer_email, $customer_address) {
        $sql = "INSERT INTO customer(customer_name, customer_email, customer_phone, customer_address)
        VALUE('".$customer_name."','".$customer_email."','".$customer_phone."','".$customer_address."')";
        $query = mysqli_query($this->mysqli, $sql);
        return $query;
    }
}
?>
