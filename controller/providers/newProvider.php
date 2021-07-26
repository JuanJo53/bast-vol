<?php
    include '../../model/Provider.php';

    $name=$_POST['prov_name'];
    $email=$_POST['prov_email'];
    $phone=$_POST['prov_phone'];
    $city=$_POST['prov_city'];
    $country=$_POST['prov_country'];

    $provider = new Provider;
    $result = $provider->newUser($name,$email,$phone,$city,$country);
    echo $result;
    header('Location: ../../view/providers.php');

?>