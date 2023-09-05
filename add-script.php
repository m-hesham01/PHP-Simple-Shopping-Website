<?php 
include_once 'inc/Book.php';
include_once 'inc/Furniture.php';
include_once 'inc/DVD.php';
include_once 'inc/InsertObject.php';
if(empty($_POST)){}
else{
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['productType'];
    $product = new Product($sku, $name, $price);

    $ins = new InsertObject();

    $sku_error = "Please, provide a unique SKU";
    $missing_error = "Please, fill all fields";

    switch($type) {
        case "dvd":
            if(($_POST['size']) == ""){
                header("Location: add-product.php?missing_error=" . urlencode($missing_error));
            }
            else{
                $size = $_POST['size'];
                $dvd = new DVD($product, $size);
                $check = $ins->insertDVD($dvd);
                if($check) {
                    header("Location: add-product.php?sku_error=" . urlencode($sku_error));
                }
                else{
                    header("Location: view-products.php");
                }
            }
            break;
    
        case "book":
            if(($_POST['weight']) == ""){
                header("Location: add-product.php?missing_error=" . urlencode($missing_error));
            }
            else {
                $weight = $_POST['weight'];
                $book = new Book($product, $weight);
                $check = $ins->insertBook($book);
                if($check) {
                    header("Location: add-product.php?sku_error=" . urlencode($sku_error));
                }
                else{header("Location: view-products.php");}
            }
            break;
    
        case "furniture":
            if((($_POST['height']) == "") || (($_POST['width']) == "") || (($_POST['length']) == "")){
                header("Location: add-product.php?missing_error=" . urlencode($missing_error));
            }
            else{
                $height = $_POST['height'];
                $width = $_POST['width'];
                $length = $_POST['length'];
                $furniture = new Furniture($product, $height, $width, $length);
                $check = $ins->insertFurniture($furniture);
                if($check) {
                    header("Location: add-product.php?sku_error=" . urlencode($sku_error));
                }
                else{header("Location: view-products.php");}
            }
            break;
    }
}?>