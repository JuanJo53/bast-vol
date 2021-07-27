<?php
    include '../../model/Sale.php';
    
    function removeSale(){
        $saleId=$_POST['sale_idDel'];
        $sale = new Sale;
        $response = $sale->deleteSale($saleId);
        return $response;
    }
    echo removeSale();
    
    header('Location: ../../view/sales.php');

?>