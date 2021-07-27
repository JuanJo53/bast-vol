<?php
    include '../../model/Sale.php';
    
    function removeSale(){
        $saleId=$_POST['saleIdDel'];
        $sale = new Sale;
        $response = $sale->deleteSale($saleId);
        $responseDetails = $sale->deleteSaleDetail($saleId);
        return $response;
    }
    echo removeSale();
    
    header('Location: ../../view/sales.php');

?>