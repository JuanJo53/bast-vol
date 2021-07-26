<?php
    include '../../model/Product.php';
    
    function showProductDetails(){
        $productId=$_GET['prod_id'];
        $product = new Product;
        $productData = $product->getProductById($productId);
        $response=$productData->fetch_assoc();
        return json_encode($response);
    }
    echo showProductDetails();

?>