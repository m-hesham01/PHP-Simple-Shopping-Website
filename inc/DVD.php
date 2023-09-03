<?php
include_once 'Product.php';

class DVD extends Product { // by the way, it is redundant to say "DVD-disc" as the 2nd D in "DVD" stands for "Disc"
    
    public $sku;
    public $name;
    public $price;
    public $size;

    function __construct($product, $size) {
        $this->sku = $product->get_SKU();
        $this->name = $product->get_name();
        $this->price = $product->get_price();
        $this->size = $size;
    }

}
?>