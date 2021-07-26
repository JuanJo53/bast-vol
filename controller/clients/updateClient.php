<?php
    include '../../model/Client.php';

    function updateClientData(){   
        $cliId=$_POST['cli_idE'];
        $name=$_POST['client_nameE'];
        $nit=$_POST['client_nitE'];
        $phone=$_POST['client_phoneE'];
        $email=$_POST['client_emailE'];
    
        $client = new Client;
        $response = $client->updateClient($cliId,$name,$nit,$phone,$email);
        return $response;
    }
    echo updateClientData();
    
    header('Location: ../../view/clients.php');

?>