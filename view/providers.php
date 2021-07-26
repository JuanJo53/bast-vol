<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAST-VOL | Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(document).on("click", ".openEditModal", function () {
            var id = $(this).data('id');
            $(".idInput #prov_idEdit").val( id );
            $.getJSON('../controller/providers/getProviderDetails.php',{'prov_id':id} ,function( data ) {
                console.log(data);
                $(".nameInput #prov_nameEdit").val( data.PRO_NOMBRE );
                $(".emailInput #prov_emailEdit").val( data.PRO_CORREO );
                $(".phoneInput #prov_phoneEdit").val( data.PRO_TELEFONO );
                $(".cityInput #prov_cityEdit").val( data.PRO_CIUDAD );
                $(".countryInput #prov_countryEdit").val( data.PRO_PAIS );
            });
        });
    </script>
    <script>
        $(document).on("click", ".openDeleteModal", function () {
            var id = $(this).data('id');
            $(".idDelInput #prov_idDel").val( id );
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
						<a class="nav-link" href="sales.php">Ventas</a>
					</li>
                    <?php
                        if($_SESSION['TIPO']=='admin'){
                            echo "<li class='nav-item'>
                                    <a class='nav-link active' href='providers.php'>Proveedores</a>
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
                    <h5>Gestiona a los</h5>
                    <h1>Proveedores</h1>
                </div>
			</div>
		</div>
        <div class="row m-3">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newProvModal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                </svg>
                Nuevo Proveedor
            </button>
        </div>
        <div class="row g-4">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NOMBRE DEL PROVEEDOR</th>
                            <th scope="col">CORREO ELECTRONICO</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">CIUDAD</th>
                            <th scope="col">PAIS</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once '../controller/providers/getProviders.php';
                            echo showProviders();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>

    <!-- New Provider Modal -->
    <div class="modal fade" id="newProvModal" tabindex="-1" aria-labelledby="newProvModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action='../controller/providers/newProvider.php'>
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="prov_name" class="col-form-label">Nombre del Proveedor:</label>
                                <input type="text" class="form-control" id="prov_name" name="prov_name" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="prov_email" class="col-form-label">Correo Electronico:</label>
                                <input type="email" class="form-control" id="prov_email" name="prov_email" placeholder="prov@prov.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="prov_phone" class="col-form-label">Telefono:</label>
                                <input type="number" class="form-control" id="prov_phone" name="prov_phone" placeholder="222222222" required>
                            </div>
                            <div class="mb-3">
                                <label for="prov_city" class="col-form-label">Ciudad:</label>
                                <input type="text" class="form-control" id="prov_city" name="prov_city" placeholder="Ciudad Maravilla" required>
                            </div>
                            <div class="mb-3">
                                <label for="prov_country" class="col-form-label">Pais:</label>
                                <input type="text" class="form-control" id="prov_country" name="prov_country" placeholder="Pais Algo" required>
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
    <!-- New Provider Modal -->

    <!-- Edit Provider Modal -->
    <div class="modal fade" id="editProvModal" tabindex="-1" aria-labelledby="editProvModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method='post' action="../controller/providers/updateProvider.php">
            <div class="modal-body">                   
                    <div class="mb-3 idInput">        
                        <label for="prov_idEdit" class="col-form-label">ID:</label>
                        <input type="text" class="form-control" id="prov_idEdit" name="prov_idEdit" readonly>
                    </div>
                    <div class="mb-3 nameInput">
                        <label for="prov_nameEdit" class="col-form-label">Nombre del Proveedor:</label>
                        <input type="text" class="form-control" id="prov_nameEdit" name="prov_nameEdit" placeholder="Nombre" required>
                    </div>
                    <div class="mb-3 emailInput">
                        <label for="prov_emailEdit" class="col-form-label">Correo Electronico:</label>
                        <input type="email" class="form-control" id="prov_emailEdit" name="prov_emailEdit" placeholder="prov@prov.com" required>
                    </div>
                    <div class="mb-3 phoneInput">
                        <label for="prov_phoneEdit" class="col-form-label">Telefono:</label>
                        <input type="number" class="form-control" id="prov_phoneEdit" name="prov_phoneEdit" placeholder="222222222" required>
                    </div>
                    <div class="mb-3 cityInput">
                        <label for="prov_cityEdit" class="col-form-label">Ciudad:</label>
                        <input type="text" class="form-control" id="prov_cityEdit" name="prov_cityEdit" placeholder="Ciudad Maravilla" required>
                    </div>
                    <div class="mb-3 countryInput">
                        <label for="prov_countryEdit" class="col-form-label">Pais:</label>
                        <input type="text" class="form-control" id="prov_countryEdit" name="prov_countryEdit" placeholder="Pais Algo" required>
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
    <!-- Edit Provider Modal -->

    <!-- Delete Provider Modal -->
    <div class="modal fade" id="delProvModal" tabindex="-1" aria-labelledby="delProvModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro que desea eliminar este proveedor?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action="../controller/providers/deleteProvider.php">                
                    <div class="modal-body">
                        <div class="mb-3 idDelInput">        
                            <label for="prov_idDel" class="col-form-label">ID de proveedor por eliminar:</label>
                            <input type="text" class="form-control" id="prov_idDel" name="prov_idDel" readonly>
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
    <!-- Delete Provider Modal -->
    
</body>
</html>