<?php
include_once 'Product.php';

class Book extends Product {
    public $sku;
    public $name;
    public $price;
    public $weight;

    function __construct($product, $weight) {
        $this->sku = $product->get_SKU();
        $this->name = $product->get_name();
        $this->price = $product->get_price();
        $this->weight = $weight;
    }
}

?>