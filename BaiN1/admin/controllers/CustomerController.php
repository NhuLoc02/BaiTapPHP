<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

require_once './models/CustomerModel.php';
$customerModel = new CustomerModel($mysqli);

class CustomerController
{
    private $customer_id;
    private $customer_name;
    private $customer_gender;
    private $customer_email;
    private $customer_phone;
    private $customer_address;
    public function __construct($customer_id = null, $customer_name = null, $customer_gender = null, $customer_email = null, $customer_phone = null, $customer_address = null) {
        $this->customer_id = $customer_id;
        $this->customer_name = $customer_name;
        $this->customer_gender = $customer_gender;
        $this->customer_email = $customer_email;
        $this->customer_phone = $customer_phone;
        $this->customer_address = $customer_address;
    }

    public function customerList($customerModel)
    {
        $customers = $customerModel->getCustomer();
        require_once './views/CustomerListView.php';
    }
    public function deleteCustomer($customerId)
    {
        global $customerModel;
        $customerModel->deleteCustomer($customerId);
    }
} 


$action = isset($_GET['action']) ? $_GET['action'] : null;
$customerId = isset($_GET['customer_id']) ? $_GET['customer_id'] : null; // Add this line to fetch the brand_id
$customerName = isset($_POST['customer_name']) ? $_POST['category_name'] : null;
$customerGender = isset($_POST['customer_gender']) ? $_POST['customer_gender'] : null;
$customerEmail = isset($_POST['customer_email']) ? $_POST['customer_email'] : null;
$customerPhone = isset($_POST['customer_phone']) ? $_POST['customer_phone'] : null;
$customerAddress = isset($_POST['customer_address']) ? $_POST['customer_address'] : null;
$customerController = new customerController($customerId, '');

switch ($action) {
    case 'customer_emport':
        // Handle creation of a new
        break;
    default:
        $customerController->customerList($customerModel); // Pass $brandModel as an argument
        break;
}

?>