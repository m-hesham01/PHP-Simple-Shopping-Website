<?php 
include_once 'inc\Book.php';
include_once 'inc\Furniture.php';
include_once 'inc\DVD.php';
include_once 'inc\InsertObject.php';
if(empty($_POST)){}
else{
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['product-type'];
    $product = new Product($sku, $name, $price);

    $ins = new InsertObject();
    
    switch($type) {
        case "dvd":
            $size = $_POST['size'];
            $dvd = new DVD($product, $size);
            $ins->insertDVD($dvd);
            header("Location: view-products.php");
            break;
    
        case "book":
            $weight = $_POST['weight'];
            $book = new Book($product, $weight);
            $ins->insertBook($book);
            header("Location: view-products.php");
            break;
    
        case "furniture":
            $height = $_POST['height'];
            $width = $_POST['width'];
            $length = $_POST['length'];
            $furniture = new Furniture($product, $height, $width, $length);
            $ins->insertFurniture($furniture);
            header("Location: view-products.php");
            break;
    }
}?>