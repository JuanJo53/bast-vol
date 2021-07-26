<?php
    include '../../model/Provider.php';
    
    function removeProvider(){
        $userId=$_POST['prov_idDel'];
        $provider = new Provider;
        $response = $provider->deleteProvider($userId);
        return $response;
    }
    echo removeProvider();
    
    header('Location: ../../view/providers.php');

?>