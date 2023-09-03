<?php
class DeleteObject{
    private $servername = "localhost:3308";
    private $username = "root";
    private $password = "root";
    private $dbname = "scandiweb";

    private $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }

    function deleteProducts($selected) {
        if (!is_array($selected)) {
            $selected = [$selected];
        }
        mysqli_begin_transaction($this->conn);
    
        try {
            foreach ($selected as $x) {
                $locate_query = "SELECT `product_type` from ledger WHERE SKU = '$x'";
                $result = mysqli_query($this->conn, $locate_query);
    
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $table = strtolower($row['product_type']);
                    $delete_ledger = "DELETE from ledger WHERE SKU = '$x'";
                    $delete_table = "DELETE from $table WHERE SKU = '$x'";
                    mysqli_query($this->conn, $delete_ledger);
                    mysqli_query($this->conn, $delete_table);
                }
            }
            mysqli_commit($this->conn);
            return true;
        } catch (Exception $e) {
            mysqli_rollback($this->conn);
            return false;
        }
    }
}

?>