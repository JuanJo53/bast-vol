<?php
    include '../model/Sale.php';
    include '../model/Client.php';
    include '../model/Product.php';
    function showSales(){
        $sale = new Sale;
        $sales = $sale->getAllSales();
        $salesHtml='';
        if(!empty($sales)){
            while($row=$sales->fetch_array()){
                $salesHtml.="
                <tr>
                    <th scope='row'>".$row['VEN_ID']."</th>
                    <td>".$row['USR_NOMBRES']."</td>
                    <td>".$row['CLI_NOMBRE']."</td>
                    <td>".$row['ART_NOMBRE']."</td>
                    <td>".$row['DV_CANTIDAD']."</td>
                    <td>".$row['VEN_TOTAL']."</td>
                    <td>".$row['VEN_FECHA']."</td>";
                if($_SESSION['TIPO']=='admin'){
                    $salesHtml.="                    
                        <td>
                            <button class='btn btn-info openEditModal' data-bs-toggle='modal' data-bs-target='#editSaleModal' role='button' type='submit' id='saleIdEdit' name='saleIdEdit' data-id='".$row['VEN_ID']."'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fil='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                            </button>
                        </td>
                    </tr>";
                }
            }
        }else{
            $salesHtml.="<tr><th style='color:red';>¡No hay nada que mostrar!</th></tr>";
        }
        return $salesHtml;
    }
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
        $products = $product->getAllProducts();
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