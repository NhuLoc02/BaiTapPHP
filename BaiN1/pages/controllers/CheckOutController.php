<?php
require_once './pages/models/CheckOutModel.php';

class CustomerController {
    private $customerModel;

    public function __construct($mysqli) {
        $this->customerModel = new CustomerModel($mysqli);
    }

    public function getCustomerDetails($account_id) {
        return $this->customerModel->getCustomerByAccountId($account_id);
    }
}
if (isset($_SESSION['account_id'])) {
    $account_id = $_SESSION['account_id'];


    $customerController = new CustomerController($mysqli);

    $customer = $customerController->getCustomerDetails($account_id);
    require_once './pages/views/CheckOutView.php';
    
}
?>
