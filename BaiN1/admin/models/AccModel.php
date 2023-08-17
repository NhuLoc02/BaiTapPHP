<?php
// models/AccountModel.php
require_once 'config/config.php';

class AccountModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getAccountList($keyword = "") {
        $accounts = array(); // Move the declaration outside the if-else statement
        
        if (!empty($keyword)) {
            $sql = "SELECT * FROM account WHERE account_email LIKE '%" . $keyword . "%' ORDER BY account_type DESC";
            $query = $this->mysqli->query($sql);
            
            while ($row = $query->fetch_assoc()) {
                $accounts[] = $row;
            }
        } else {
            $sql = "SELECT * FROM account ORDER BY account_type DESC";
            $query = $this->mysqli->query($sql);
            
            while ($row = $query->fetch_assoc()) {
                $accounts[] = $row;
            }
        }
        
        return $accounts;
    }
    
    public function getAccId($account_id) {
        $sql = "SELECT * FROM account WHERE account_id = '$account_id' LIMIT 1";
        $query = $this->mysqli->query($sql);
        $accountsthree = array();
        
        while ($rowthree = $query->fetch_assoc()) {
            $accountsthree[] = $rowthree;
        }
        
        return $accountsthree;
    }
    
    public function editAcc($account_id, $account_type, $account_status) {
        $sql_update_account = "UPDATE account SET account_type= '$account_type', account_status='$account_status'  
        WHERE account_id = $account_id";
        mysqli_query($this->mysqli, $sql_update_account);

        // $sql_update_customer = "UPDATE customer SET customer_name = '$account_name', customer_phone = '$account_phone', customer_gender = '$customer_gender', customer_address = '$account_address' WHERE account_id = $account_id";
        // mysqli_query($this->mysqli, $sql_update_customer);
    }
}
?>