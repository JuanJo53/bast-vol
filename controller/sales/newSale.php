<?php
    include '../../model/Sale.php';
    include '../../model/Product.php';

    $userId=$_SESSION['CODIGO'];
    $clientId=$_POST['saleCliId'];
    $prodId=$_POST['saleProdId'];
    $quantity=$_POST['saleQuant'];
    
    $product = new Product;    
    $productData = $product->getProductById($prodId);
    if(!empty($productData)){
        while($row=$productData->fetch_array()){
            $price=$row['ART_PRECIO'];
        }
    }
    $total=$price*$quantity;
    $date=date('d/m/Y', strtotime('-1 day'));

    $sale = new Sale;
    $newSaleResult = $sale->newSale($date,$userId,$clientId,$quantity,$total);
    $lastSaleId = $sale->getLastSale($userId);
    $newSaleDetailResult = $sale->newSaleDetail($prodId,$quantity,$lastSaleId,$total);

    header('Location: ../../view/sales.php');

?>