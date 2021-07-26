<?php
    include '../../model/Client.php';
    
    function showClientDetails(){
        $clientId=$_GET['cli_id'];
        $client = new Client;
        $clientData = $client->getClientById($clientId);
        $response=$clientData->fetch_assoc();
        return json_encode($response);
    }
    echo showClientDetails();

?>