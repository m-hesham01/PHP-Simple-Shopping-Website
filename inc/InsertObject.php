<?php
class InsertObject{
    private $servername = "mysql";
    private $username = "root";
    private $password = "root";
    private $dbname = "scandiweb";

    private $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }

    function checkSKU($product) {
        $query = "SELECT * FROM ledger WHERE SKU = '$product->sku'";
        $result = mysqli_query($this->conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            return true;
        }    
        else {return false;}
    }
    function insertLedger($product, $type){
        $query = "INSERT INTO ledger VALUES ('$product->sku','$product->name', '$type')";
        mysqli_query($this->conn, $query);
    }
    function insertDVD($dvd) {
        if($this->checkSKU($dvd)){
            return true;
        }
        else{
            $query = "INSERT INTO dvd VALUES ('$dvd->sku','$dvd->name','$dvd->price', '$dvd->size MB')";
            mysqli_query($this->conn, $query);
            $this->insertLedger($dvd, "DVD");
            return false;
        }
    }

    function insertFurniture($furniture) {
        if($this->checkSKU($furniture)){
            return true;
        }
        else{
            $query = "INSERT INTO furniture VALUES ('$furniture->sku','$furniture->name','$furniture->price', '$furniture->height X $furniture->width X $furniture->length')";
            mysqli_query($this->conn, $query);
            $this->insertLedger($furniture, "Furniture");
            return false;
        }
    }

    function insertBook($book) {
        if($this->checkSKU($book)){
            return true;
        }
        else{
            $query = "INSERT INTO book VALUES ('$book->sku','$book->name','$book->price', '$book->weight Kg')";
            mysqli_query($this->conn, $query);
            $this->insertLedger($book, "Book");
            return false;
        }
    }
}

?>