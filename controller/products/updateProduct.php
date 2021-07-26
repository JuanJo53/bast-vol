<?php
    include '../../model/Product.php';

    function updateProductData(){ 

        $id=$_POST['prod_idE'];
        $name=$_POST['prod_nameE'];
        $idCat=$_POST['prod_idCatE'];
        $idProv=$_POST['prod_idProvE'];
        $price=$_POST['prod_priceE'];
        $stock=$_POST['prod_stockE'];

        $product = new Product;
        $response = $product->updateProduct($id,$name,$idCat,$idProv,$price,$stock);
        return $response;
    }
    echo updateProductData();
    
    header('Location: ../../view/products.php');

?>