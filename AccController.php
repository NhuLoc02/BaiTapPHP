<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
include './models/AccModel.php';
$accModel = new AccountModel($mysqli);
class AccountController 
{
    private $account_id;
    // private $account_name;
    // private $account_phone;
    // private $account_address;
    // private $customer_gender;
    private $account_type;
    private $account_status;

    public function __construct($account_id = NULL, $account_type = NULL, $account_status = NULL) {
        $this->account_id = $account_id;
        // $this->account_name = $account_name;
        // $this->account_phone = $account_phone;
        // $this->account_address = $account_address;
        // $this->customer_gender = $customer_gender;
        $this->account_type= $account_type;
        $this->account_status= $account_status;
    }

    public function accList($accModel) {
        $keyword = isset($_POST['account_keyword']) ? $_POST['account_keyword'] : "";
        $accounts = $accModel->getAccountList($keyword);
      
        include 'views/AccListView.php';
    }

    public function editAcc() {
        global $accModel;
        
        if (isset($_GET['account_id'])) 
        {
            $account_id = $_GET['account_id'];
            $accounts = $accModel->getAccId($account_id);


            if (isset($_POST['account_change'])) {
                // $account_name = $_POST['account_name'];
                // $account_phone = $_POST['account_phone'];
                // $account_address = $_POST['account_address'];
                // $customer_gender = $_POST['customer_gender']; 
                $account_type= $_POST['account_type'];
                $account_status=$_POST['account_status'];
                $accModel->editAcc($account_id, $account_type, $account_status);
    
                // Redirect properly with the correct URL
                echo "<script>window.location.href = '../../demo/demo/index.php?action=account&query=account_list';</script>";
            }
        }
        require_once './views/AccEditView.php';
    }
}


// Define other variables needed for account editing here
// $account_name = isset($_POST['account_name']) ? $_POST['account_name'] : null;
// $account_phone = isset($_POST['account_phone']) ? $_POST['account_phone'] : null;
// $account_address = isset($_POST['account_address']) ? $_POST['account_address'] : null;
// $customer_gender = isset($_POST['customer_gender']) ? $_POST['customer_gender'] : null;
$accController = new AccountController();
