<?php
class Product {
    // properties
    public $SKU;
    public $name;
    public $price;

    // constructor
    function __construct($SKU, $name, $price) {
        $this->SKU = $SKU;
        $this->name = $name;
        $this->price = "$".$price;
    }

    function get_SKU() {
        return $this->SKU;
    }
    
    function get_name() {
        return $this->name;
    }
    
    function get_price() {
        return $this->price;
    }
}
?>