<?php
    include_once 'inc/DeleteObject.php';
    if (isset($_POST['delete-product-btn'])) {
        $selectedIds = $_POST['selected_ids'];
        $del = new DeleteObject();
        
        if ($del->deleteProducts($selectedIds)) {
            header("Location: view-products.php");
            exit;
        }
    }
?>