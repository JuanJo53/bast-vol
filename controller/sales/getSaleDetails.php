<?php
    include '../../model/Sale.php';
    
    function showSaleDetails(){
        $saleId=$_GET['sale_id'];
        $sale = new Sale;
        $saleData = $sale->getSaleById($saleId);
        $response=$saleData->fetch_assoc();
        return json_encode($response);
    }
    echo showProviderDetails();

?>