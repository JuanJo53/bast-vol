<?php
    include '../../model/Product.php';
    function showProducts(){
        $product = new Product;
        $products = $product->getAllProducts();
        $productsHtml='';        
        if(!empty($products)){
            while($row=$products->fetch_array()){
                $productsHtml.="<option value='".$row['ART_ID']."'>".$row['ART_NOMBRE']."</option>";
            }
        }else{
            $productsHtml.="<option style='color:red';>¡No hay nada que mostrar!</option>";
        }
        return $productsHtml;
    }
    echo showProducts();

?>