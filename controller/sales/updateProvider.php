<?php
    include '../../model/Provider.php';

    function updateProviderData(){   
        $provid=$_POST['prov_idEdit'];
        $name=$_POST['prov_nameEdit'];
        $email=$_POST['prov_emailEdit'];
        $phone=$_POST['prov_phoneEdit'];
        $city=$_POST['prov_cityEdit'];
        $country=$_POST['prov_countryEdit'];
    
        $provider = new Provider;
        $response = $provider->updateProvider($provid,$name,$email,$phone,$city,$country);        return $response;
    }
    echo updateProviderData();
    
    header('Location: ../../view/providers.php');

?>