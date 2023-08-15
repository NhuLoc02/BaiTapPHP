<?php
// models/AccountModel.php
$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

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
    
    public function editAcc($account_id, $account_name, $account_phone, $account_address, $customer_gender) {
        $sql_update_account = "UPDATE account SET account_name = '$account_name', account_phone = '$account_phone' WHERE account_id = $account_id";
        mysqli_query($this->mysqli, $sql_update_account);

        $sql_update_customer = "UPDATE customer SET customer_name = '$account_name', customer_phone = '$account_phone', customer_gender = '$customer_gender', customer_address = '$account_address' WHERE account_id = $account_id";
        mysqli_query($this->mysqli, $sql_update_customer);
    }
}
?>
