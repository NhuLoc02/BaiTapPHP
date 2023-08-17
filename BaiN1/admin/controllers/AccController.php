<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
include './models/AccModel.php';
$accModel = new AccountModel($mysqli);
class AccountController 
{
    private $account_id;

    private $account_type;
    private $account_status;

    public function __construct($account_id = NULL, $account_type = NULL, $account_status = NULL) {
        $this->account_id = $account_id;
    ;
        $this->account_type= $account_type;
        $this->account_status= $account_status;
    }

    public function accList($accModel) {
        $keyword = isset($_POST['account_keyword']) ? $_POST['account_keyword'] : "";
        $accounts = $accModel->getAccountList($keyword);
      
        include './views/AccView.php';
    }

    public function editAcc() {
        global $accModel;
        
        if (isset($_GET['account_id'])) 
        {
            $account_id = $_GET['account_id'];
            $accounts = $accModel->getAccId($account_id);


            if (isset($_POST['account_change'])) {
               
                $account_type= $_POST['account_type'];
                $account_status=$_POST['account_status'];
                $accModel->editAcc($account_id, $account_type, $account_status);
    
                // Redirect properly with the correct URL
                echo "<script>window.location.href = '../../BaiN1/admin/index.php?action=account&query=account_list';</script>";
            }
        }
        require_once './views/AccEditView.php';
    }
}



$accController = new AccountController();