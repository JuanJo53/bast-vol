<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAST-VOL | Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#newSaleModal').on('hidden.bs.modal', function (e) {
            var productsHtml;
            $.ajax({ 
                url: '../controller/sales/getProducts.php',
                success: function (response) {
                    productsHtml=response;
                    $( "div.productsList" ).replaceWith("<div class='productsList' id='productsList'><label for='saleProdIdE' class='col-form-label'>Articulo:</label><select class='form-select' aria-label='Products select' id='saleProdIdE' name='saleProdIdE' required><option selected disabled>Ninguna</option>"+productsHtml+"</select><div class='row'><div class='mb-3'><label for='saleQuant' class='col-form-label'>Cantidad:</label><input type='number' min='1' class='form-control' id='saleQuant' name='saleQuant' placeholder='100' required></div></div></div>");
                }
            });
        });
    </script>
    <script>
        $(document).on("click", ".openDetailModal", function () {
            var id = $(this).data('id');
            $.ajax({
                url:'../controller/sales/getSaleProducts.php',
                method:'post',
                data:{'saleDetId':id},
                success: function( data ) {
                    $( "#productsTable" ).append(data);
                }
            });            
            $(".idInput #saleIdDet").val( id );
        });
    </script>
    <script>
        $(document).on("click", ".openDeleteModal", function () {
            var id = $(this).data('id');
            $(".idDelInput #saleIdDel").val( id );
        });
    </script>

</head>
<body data-spy="scroll" data-target="#navbar" data-offset="56">
	<!--Header-->
	<nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container">
            <?php
                session_start();    
                echo "<h4 style='color:white;margin-right:10px;'>??Hola ". $_SESSION['USUARIO']."!</h4>";
            ?>
			<a class="navbar-brand" href="#">BAST-VOL</a>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbar"
				aria-controls="navbarSupportedContent"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav ml-auto ms-5">
					<li class="nav-item">
						<a class="nav-link" href="home.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="products.php">Articulos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="clients.php">Clientes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="sales.php">Ventas</a>
					</li>
                    <?php
                        if($_SESSION['TIPO']=='admin'){
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='providers.php'>Proveedores</a>
                                </li>";
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='categories.php'>Categorias</a>
                                </li>";
                            echo "<li class='nav-item'>
                                    <a class='nav-link' href='users.php'>Usuarios</a>
                                </li>";
                        }
                    ?>
					<!-- <li class="nav-item dropdown">
						<a
							class="nav-link dropdown-toggle"
							href="#"
							id="navbarDropdown"
							role="button"
							data-toggle="dropdown"
							aria-haspopup="true"
							aria-expanded="false"
						>
							Nuestro Credo
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="staticPages/finalidadFe.html">Finalidad de la Fe</a>
							<a class="dropdown-item" href="staticPages/proyeccionFe.html">Proyeccion de la Fe</a>
						</div>
					</li> -->
				</ul>
                <form method="post" action="../controller/logout.php">
                    <button class="btn btn-outline-danger text-md- ms-5" type="submit">Cerrar Sesion</button>
                </form>
			</div>
		</div>
	</nav>
	<!--header-->
    <div class="container">
		<div class="row">
			<div class="col text-center text-uppercase">
                <div class="home-title">
                    <h5>Gestiona las</h5>
                    <h1>Ventas</h1>
                </div>
			</div>
		</div>
        <div class="row m-3">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newSaleModal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                </svg>
                Nueva Venta
            </button>
        </div>
        <div class="dateFilter">
            <div class="row">
                <div class="col-md-2">
                    <label for="startDate" class="col-form-label">Desde:</label>
                    <input class="form-control" type="text" id="startDate" name='startDate'>
                </div>
                <div class="col-md-2">
                    <label for="startDate" class="col-form-label">Hasta:</label>
                    <input class="form-control" type="text" id="endDate" name='endDate'>            
                </div>
                <div class="col-md-1">
                    <label for="startDate" class="col-form-label">Buscar</label>
                    <button class="btn btn-primary" type='button' role="button" id='searchByDate' name='searchByDate'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
                <div class="col-md-3">
                    <?php
                        if($_SESSION['TIPO']=='admin'){
                            echo "
                            <button class='btn btn-success' type='button' role='button' id='downloadReport' name='downloadReport'>
                                Descargar Reporte Excel
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
                                <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                                <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
                                </svg>
                            </button>";
                        }
                    ?>
                </div>
                <div class="col-md-3">
                    <?php
                        if($_SESSION['TIPO']=='admin'){
                            echo "
                            <button class='btn btn-primary' type='button' role='button' id='downloadReportDetails' name='downloadReportDetails'>
                                Descargar Reporte Detallado Excel
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
                                <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                                <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
                                </svg>
                            </button>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col" id="saleTableData">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">EMPLEADO</th>
                            <th scope="col">CLIENTE</th>
                            <th scope="col">NIT CLIENTE</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">FECHA</th>
                            <th scope='col'>Detalle</th>
                            <?php
                                if($_SESSION['TIPO']=='admin'){
                                    echo "<th scope='col'>Eliminar</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody id='salesTable'>
                    </tbody>
                </table>
            </div>
        </div>
	</div>

    <!-- New Sale Modal -->
    <div class="modal fade" id="newSaleModal" tabindex="-1" aria-labelledby="newSaleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" id='newSaleForm' novalidate>
                    <div class="modal-body newSaleBody">
                        <div class="mb-3">
                            <label for="saleCliId" class="col-form-label">NIT Cliente:</label>
                            <select class="form-select" aria-label="Clients select" id="saleCliId" name="saleCliId" required>
                                <option value="" selected disabled>Ninguna</option>
                                <?php
                                    include_once '../controller/sales/getProdsAndClis.php';
                                    echo showClients();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for="saleProdIdE" class="col-form-label">Articulos:</label>
                            </div>
                            <hr>
                            <div class="row ps-5 pe-5">
                                <div class="productsList" id="productsList">                                    
                                    <label for="saleProdIdE1" class="col-form-label">Articulo:</label>
                                    <select class="form-select" aria-label="Products select" id="saleProdIdE1" name="saleProdIdE1" required>
                                        <option value="" selected disabled>Ninguna</option>
                                        <?php
                                            echo showProducts();
                                        ?>
                                    </select>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="saleQuant1" class="col-form-label">Cantidad:</label>
                                            <input type="number" min="1" class="form-control" id="saleQuant1" name="saleQuant1" placeholder="100" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark addProductBtn" >Agregar Articulo</button>
                                </div>                 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success submitNewSale">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <!-- New Sale Modal -->

    <!-- Sale Products Modal -->
    <div class="modal fade" id="prodDetailModal" tabindex="-1" aria-labelledby="prodDetailModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Productos Incluidos en la Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body newSaleBody">
                    <div class="mb-3 idInput">        
                        <label for="prod_idE" class="col-form-label">ID de la venta:</label>
                        <input type="text" class="form-control" id="saleIdDet" name="saleIdDet" readonly>
                    </div>
                    <div class="row g-4">
                        <div class="col">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ARTICULO</th>
                                        <th scope="col">PRECIO</th>
                                        <th scope="col">CANTIDAD</th>
                                        <th scope="col">SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody id='productsTable'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                        if($_SESSION['TIPO']=='admin'){
                            echo "
                            <button class='btn btn-success' type='button' role='button' id='downloadSingleSaleReportDetails' name='downloadSingleSaleReportDetails'>
                                Descargar Detalle Excel
                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-download' viewBox='0 0 16 16'>
                                <path d='M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z'/>
                                <path d='M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z'/>
                                </svg>
                            </button>";
                        }
                    ?>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Atras</button>
                </div>
            </div>
        </div>
    </div>    
    <!-- Sale Products Modal -->

    <!-- Delete Sale Modal -->
    <div class="modal fade" id="delSaleModal" tabindex="-1" aria-labelledby="delSaleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title message_error" id="exampleModalLabel">??Al eliminar esta venta podria afectar algunos registros!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action="../controller/sales/deleteSale.php">                
                    <div class="modal-body">
                        <div class="mb-3 idDelInput">        
                            <label for="saleIdDel" class="col-form-label">ID de la venta por eliminar:</label>
                            <input type="text" class="form-control" id="saleIdDel" name="saleIdDel" readonly>
                        </div>
                        <h5>??Esta seguro que desea eliminar esta venta?</h5>
                        <h1 class='badge bg-warning text-dark'>??Esta accion no se puede deshacer!</h1>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Si</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Sale Modal -->
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script language="javascript">        
		$(document).ready(function () {
            var c=1;
            $(document).on("click", ".addProductBtn", function () {
                var productsHtml;
                c++;
                $.ajax({ 
                    url: '../controller/sales/getProducts.php',
                    success: function (response) {
                        productsHtml=response;
                        $( "div.productsList" ).append("<label for='saleProdIdE' class='col-form-label'>Articulo:</label><select class='form-select' aria-label='Products select' id='saleProdIdE"+c+"' name='saleProdIdE"+c+"' required><option value='' selected disabled>Ninguna</option>"+productsHtml+"</select><div class='row'><div class='mb-3'><label for='saleQuant' class='col-form-label'>Cantidad:</label><input type='number' class='form-control' id='saleQuant"+c+"' name='saleQuant"+c+"' placeholder='100' required></div></div>");
                    }
                });
            });
            $(".submitNewSale").click(function () {
                var prodsList = [];
                var prodId;
                var clientId;
                var quantity;
                for(i=1 ; i<=c ; i++){
                    prodId=$('#saleProdIdE'+i).val();
                    quantity=$('#saleQuant'+i).val();
                    newProd={"prodId":prodId, "quantity":quantity};
                    prodsList.push(newProd);
                }
                clientId=$('#saleCliId').val();
                
                var forms = document.querySelectorAll('.needs-validation');

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated')
                    })
                });

                if($("#newSaleForm").valid()){
                    $.ajax({                
                        url:"../controller/sales/newSale.php", 
                        type: "POST",
                        data: { saleCliId: clientId, prodsList: JSON.stringify(prodsList)},

                    }) 
                }else{
                    console.log('Formulario no valido!');
                }
            });		
        });
    </script>
    <script>
        $('#prodDetailModal').on('hidden.bs.modal', function (e) {            
            $( "#productsTable" ).html('');
        });
    </script>
    <script>        
		$(document).ready(function () {
            $('#startDate').datepicker('setDate', new Date('2021-1-1'));
            $('#endDate').datepicker('setDate', new Date());
            var startDate=$('#startDate').val();
            var endDate=$('#endDate').val();
            $.ajax({
                url:  '../controller/sales/getSales.php',
                type: "POST",
                data: {function: 'showSales', startDate: startDate, endDate: endDate },
                success: function(response){
                    $( "#salesTable" ).html('');
                    $( "#salesTable" ).append(response);
                }
            });
            $('#searchByDate').click(function(){
                var startDate=$('#startDate').val();
                var endDate=$('#endDate').val();
                $.ajax({
                    url:  '../controller/sales/getSales.php',
                    type: "POST",
                    data: {startDate: startDate, endDate: endDate },
                    success: function(response){
                        $( "#salesTable" ).html('');
                        $( "#salesTable" ).append(response);
                    }
                });
            });
            $('#downloadReport').click(function(){
                var startDate=$('#startDate').val();
                var endDate=$('#endDate').val();
                var page = encodeURI("../controller/sales/salesReport.php?startDate="+startDate+"&endDate="+endDate);
                window.location = page;
            });
            $('#downloadReportDetails').click(function(){
                var startDate=$('#startDate').val();
                var endDate=$('#endDate').val();
                var page = encodeURI("../controller/sales/salesDetailsReport.php?startDate="+startDate+"&endDate="+endDate);
                window.location = page;
            });
            $('#downloadSingleSaleReportDetails').click(function(){
                var saleId=$('#saleIdDet').val();
                var page = encodeURI("../controller/sales/singleSaleDetailReport.php?saleId="+saleId);
                window.location = page;
            });
        });
    </script>
</body>
</html>