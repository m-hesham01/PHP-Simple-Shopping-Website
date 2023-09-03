<?php
class GetObject{
    private $servername = "localhost:3308";
    private $username = "root";
    private $password = "root";
    private $dbname = "scandiweb";

    private $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    }

    function get_products() {
        $query = "
        SELECT furniture.SKU, furniture.name, furniture.price, furniture.dimensions, NULL as size, NULL as weight
        FROM ledger
        LEFT JOIN furniture
        ON ledger.SKU = furniture.SKU
        WHERE furniture.SKU IS NOT NULL
        UNION
        SELECT dvd.SKU, dvd.name, dvd.price, NULL as dimensions, dvd.size, NULL as weight
        FROM ledger
        LEFT JOIN dvd
        ON ledger.SKU = dvd.SKU
        WHERE dvd.SKU IS NOT NULL
        UNION
        SELECT book.SKU, book.name, book.price, NULL as dimensions, NULL as size, book.weight
        FROM ledger
        LEFT JOIN book
        ON ledger.SKU = book.SKU
        WHERE book.SKU IS NOT NULL
        ORDER BY SKU";
        $result = mysqli_query($this->conn, $query);
        $list = array();
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row; 
        }
        return $list;
    }
}

?>