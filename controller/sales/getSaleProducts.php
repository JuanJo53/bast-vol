<?php
    include '../../model/Sale.php';
    include '../../model/Product.php';

    $saleId=$_POST['saleDetId'];
    $sale = new Sale;
    $products = $sale->getSaleProducts($saleId);
    $productsHtml='';        
    if(!empty($products)){
        while($row=$products->fetch_array()){
            $productsHtml.="
                <tr>
                    <th scope='row'>".$row['DV_ID']."</th>
                    <td>".$row['ART_NOMBRE']."</td>
                    <td>".$row['ART_PRECIO']."</td>
                    <td>".$row['DV_CANTIDAD']."</td>
                    <td>".$row['DV_SUBTOTAL']."</td>
                </tr>";
        }
    }else{
        $productsHtml.="<tr><th style='color:red';>¡No hay nada que mostrar!</th></tr>";
    }
    echo $productsHtml;
?>