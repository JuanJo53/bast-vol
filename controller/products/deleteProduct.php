<?php
    include '../../model/Product.php';
    
    function removeProduct(){
        $productId=$_POST['prod_idD'];
        $product = new Product;
        $response = $product->deleteProduct($productId);
        return $response;
    }
    echo removeProduct();
    
    header('Location: ../../view/products.php');

?>