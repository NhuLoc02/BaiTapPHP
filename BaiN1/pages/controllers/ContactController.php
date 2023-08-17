<?php
require_once './pages/models/ContactModel.php';
$contactModel = new ContactModel($mysqli);
class ContactController {
    private $model;


    public function __construct() {
 
    }

    public function contactAdd() {
        global $contactModel;
        if (isset($_POST['customer_add'])) {
            $customer_name = $_POST['customer_name'];
            $customer_phone = $_POST['customer_phone'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];

            $contact = $contactModel ->insertContact($customer_name, $customer_phone, $customer_email, $customer_address);
        }
        require_once './pages/views/ContactView.php';
    }
}

?>
