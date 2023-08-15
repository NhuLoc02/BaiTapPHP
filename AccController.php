<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
include './models/AccModel.php';

class AccountController {
    private $account_id;
    private $account_name;
    private $account_phone;
    private $account_address;
    private $customer_gender;

    public function __construct($account_id = NULL, $account_name = NULL, $account_phone = NULL, $account_address = NULL, $customer_gender = NULL) {
        $this->account_id = $account_id;
        $this->account_name = $account_name;
        $this->account_phone = $account_phone;
        $this->account_address = $account_address;
        $this->customer_gender = $customer_gender;
    }

    public function accList($accModel) {
        $keyword = isset($_POST['account_keyword']) ? $_POST['account_keyword'] : "";
        $accounts = $accModel->getAccountList($keyword);
      
        include 'views/AccListView.php';
    }

    public function accListId() {
        global $accModel;
        
        if (isset($_GET['account_id'])) {
            $account_id = $_GET['account_id'];
            $accounts = $accModel->getAccId($account_id);

            if (isset($_POST['account_change'])) {
                if (isset($_POST['account_name'])) {
                    $account_name = $_POST['account_name'];
                } else {
                    $account_name = "";
                }

                if (isset($_POST['account_phone'])) {
                    $account_phone = $_POST['account_phone'];
                } else {
                    $account_phone = "";
                }

                if (isset($_POST['account_address'])) {
                    $account_address = $_POST['account_address'];
                } else {
                    $account_address = "";
                }

                if (isset($_POST['customer_gender'])) {
                    $customer_gender = $_POST['customer_gender'];
                } else {
                    $customer_gender = "";
                }
                
                $accModel->editAcc($account_id, $account_name, $account_phone, $account_address, $customer_gender);
    
                // Redirect properly with the correct URL
                echo "<script>window.location.href = '../../BaiN1/admin/index.php?action=account&query=account_list</script>";
                exit();
            }

            include 'views/AccEditView.php';
        }
    }
}

$account_id = isset($_GET['account_id']) ? $_GET['account_id'] : null;
$accModel = new AccountModel($mysqli);

// Define other variables needed for account editing here
$account_name = isset($_POST['account_name']) ? $_POST['account_name'] : null;
$account_phone = isset($_POST['account_phone']) ? $_POST['account_phone'] : null;
$account_address = isset($_POST['account_address']) ? $_POST['account_address'] : null;
$customer_gender = isset($_POST['customer_gender']) ? $_POST['customer_gender'] : null;
$accController = new AccountController($account_id, $account_name, $account_phone, $account_address, $customer_gender, $accModel);
