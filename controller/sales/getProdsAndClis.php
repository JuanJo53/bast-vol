<?php
    include '../model/Client.php';
    include '../model/Product.php';

    function showClients(){
        $client = new Client;
        $clients = $client->getAllClients();
        $clientsHtml='';        
        if(!empty($clients)){
            while($row=$clients->fetch_array()){
                $clientsHtml.="
                    <option value='".$row['CLI_ID']."'>".$row['CLI_NIT']."</option>";
            }
        }else{
            $clientsHtml.="<option style='color:red';>¡No hay nada que mostrar!</option>";
        }
        return $clientsHtml;
    }
    function showProducts(){
        $product = new Product;
        $products = $product->getAllAvailableProducts();
        $productsHtml='';        
        if(!empty($products)){
            while($row=$products->fetch_array()){
                $productsHtml.="
                    <option value='".$row['ART_ID']."'>".$row['ART_NOMBRE']."</option>";
            }
        }else{
            $productsHtml.="<option style='color:red';>¡No hay nada que mostrar!</option>";
        }
        return $productsHtml;
    }

?>