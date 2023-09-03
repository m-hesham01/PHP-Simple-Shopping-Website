<?php
include_once 'Product.php';

class Furniture extends Product {
    public $sku;
    public $name;
    public $price;
    public $height;
    public $width;
    public $length;

    function __construct($product, $height, $width, $length) {
        $this->sku = $product->get_SKU();
        $this->name = $product->get_name();
        $this->price = $product->get_price();
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
}

?>