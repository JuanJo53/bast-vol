<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAST-VOL | Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).on("click", ".openEditModal", function () {
            var id = $(this).data('id');
            $(".idInput #saleIdEdit").val( id );
            $.getJSON('../controller/sales/getSaleDetails.php',{'sale_id':id} ,function( data ) {
                console.log(data);
                $(".saleCliIdInput #saleCliIdE").val( data.ID_CLIENTE );
                $(".saleProdIdInput #saleProdIdE").val( data.ID_ARTICULO );
                $(".saleQuantInput #saleQuantE").val( data.DV_CANTIDAD );
            });
        });
    </script>
    <script>
        $(document).on("click", ".openDeleteModal", function () {
            var id = $(this).data('id');
            $(".idDelInput #sale_idDel").val( id );
        });
    </script>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="56">
	<!--Header-->
	<nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<div class="container">
            <?php
                session_start();    
                echo "<h4 style='color:white;margin-right:10px;'>¡Hola ". $_SESSION['USUARIO']."!</h4>";
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
        <div class="row g-4">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">EMPLEADO</th>
                            <th scope="col">CLIENTE</th>
                            <th scope="col">ARTICULO</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once '../controller/sales/getSales.php';
                            echo showSales();
                        ?>
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
                <form method='post' action='../controller/sales/newSale.php'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="saleCliId" class="col-form-label">NIT Cliente:</label>
                            <select class="form-select" aria-label="Clients select" id="saleCliId" name="saleCliId" required>
                                <option selected disabled>Ninguna</option>
                                <?php
                                    echo showClients();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="saleProdId" class="col-form-label">Articulo:</label>
                            <select class="form-select" aria-label="Products select" id="saleProdId" name="saleProdId" required>
                                <option selected disabled>Ninguna</option>
                                <?php
                                    echo showProducts();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="saleQuant" class="col-form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="saleQuant" name="saleQuant" placeholder="100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <!-- New Sale Modal -->

    <!-- Edit Sale Modal -->
    <div class="modal fade" id="editSaleModal" tabindex="-1" aria-labelledby="editSaleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles de la Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='put'>
                    <div class="modal-body">
                        <div class="mb-3 idInput">        
                            <label for="saleIdEdit" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="saleIdEdit" name="saleIdEdit" readonly>
                        </div>
                        <div class="mb-3 saleCliIdInput">
                            <label for="saleCliIdE" class="col-form-label">NIT Cliente:</label>
                            <select class="form-select" aria-label="Clients select" id="saleCliIdE" name="saleCliIdE" required>
                                <option selected disabled>Ninguna</option>
                                <?php
                                    echo showClients();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 saleProdIdInput">
                            <label for="saleProdIdE" class="col-form-label">Articulo:</label>
                            <select class="form-select" aria-label="Products select" id="saleProdIdE" name="saleProdIdE" required>
                                <option selected disabled>Ninguna</option>
                                <?php
                                    echo showProducts();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 saleQuantInput">
                            <label for="saleQuantE" class="col-form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="saleQuantE" name="saleQuantE" placeholder="100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <!-- Edit Sale Modal -->

    <!-- Delete Sale Modal -->
    <div class="modal fade" id="delSaleModal" tabindex="-1" aria-labelledby="delSaleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro que desea eliminar esta venta?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action="../controller/sales/deleteSale.php">
                    <div class="modal-body">
                        <div class="mb-3 idDelInput">        
                            <label for="sale_idDel" class="col-form-label">ID de la venta por eliminar:</label>
                            <input type="text" class="form-control" id="sale_idDel" name="sale_idDel" readonly>
                        </div>
                        <h1 class='badge bg-warning text-dark'>¡Esta accion no se puede deshacer!</h1>
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

</body>
</html>