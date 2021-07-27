<?php
    include '../../model/Sale.php';
    include '../../model/Product.php';

    session_start(); 
    $userId=$_SESSION['CODIGO'];
    $clientId=$_POST['saleCliId'];
    $prodsData=$_POST['prodsList'];
    $products=json_decode($prodsData);    
    $date=date('d/m/Y', strtotime('-1 day'));
    $total=0;

    $sale = new Sale;
    $newSaleResult = $sale->newSale($date,$userId,$clientId,$total);
    $lastSaleId = $sale->getLastSale($userId);

    for($i=0;$i<count($products);$i++) {
        $product = new Product;    
        $productData = $product->getProductById($products[$i]->prodId);
        if(!empty($productData)){
            while($row=$productData->fetch_array()){
                $price=$row['ART_PRECIO'];
            }
            $subtotal=$price*$products[$i]->quantity
            $total+=$subtotal;
            $newSaleDetailResult = $sale->newSaleDetail($products[$i]->prodId,$quantity,$lastSaleId,$subtotal);
        }
    }
    $newSaleTotalUpdateResponse = $sale->updateLastSaleTotal($lastSaleId,$total);
    print_r($newSaleResult,$lastSaleId,$productData,$newSaleDetailResult,$newSaleTotalUpdateResponse);

    // header('Location: ../../view/sales.php');

?>