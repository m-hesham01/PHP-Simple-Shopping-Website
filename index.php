<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'default';

$validPages = [
    'view-products' => 'view-products.php',
    'add-product' => 'add-product.php',
];

// Check if the requested page is valid; if not, use a default page
if (isset($validPages[$page])) {
    // Include the content file for the requested page
    include($validPages[$page]);
} else {
    // Include a default content file or display an error
    include('view-products.php');
}
?>
