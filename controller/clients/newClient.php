<?php
    include '../../model/Client.php';

    $name=$_POST['client_name'];
    $nit=$_POST['client_nit'];
    $phone=$_POST['client_phone'];
    $email=$_POST['client_email'];

    $client = new Client;
    $result = $client->newClient($name,$nit,$phone,$email);
    echo $result;
    header('Location: ../../view/clients.php');

?>