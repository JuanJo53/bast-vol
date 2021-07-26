<?php
    include '../../model/Client.php';
    
    function removeClient(){
        $clientId=$_POST['cli_idD'];
        $client = new Client;
        $response = $client->deleteClient($clientId);
        return $response;
    }
    echo removeClient();
    
    header('Location: ../../view/clients.php');

?>