<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAST-VOL | Articulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $(document).on("click", ".openEditModal", function () {
            var id = $(this).data('id');
            $(".idInput #prod_idE").val( id );
            $.getJSON('../controller/products/getProductDetails.php',{'prod_id':id} ,function( data ) {
                console.log(data);
                $(".nameInput #prod_nameE").val( data.ART_NOMBRE );
                $(".catInput #prod_idCatE").val( data.CAT_ID );
                $(".provInput #prod_idProvE").val( data.PRO_ID );
                $(".priceInput #prod_priceE").val( data.ART_PRECIO);
                $(".stockInput #prod_stockE").val( data.ART_STOCK);
            });
        });
    </script>
    <script>
        $(document).on("click", ".openDeleteModal", function () {
            var id = $(this).data('id');
            $(".idDelInput #prod_idD").val( id );
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
						<a class="nav-link active" href="products.php">Articulos</a>
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
                    <h5>Gestiona los</h5>
                    <h1>Articulos</h1>
                </div>
			</div>
		</div>
        <div class="row m-3">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#newArticleModal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
                </svg>
                Nuevo Articulo
            </button>
        </div>
        <div class="row g-4">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">CATEGORIA</th>
                            <th scope="col">PROVEEDOR</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">STOCK</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once '../controller/products/getProducts.php';
                            echo showProducts();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
    
    <!-- New Article Modal -->
    <div class="modal fade" id="newArticleModal" tabindex="-1" aria-labelledby="newArticleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Articulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action='../controller/products/newProduct.php'>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="prod_name" class="col-form-label">Nombre del Articulo:</label>
                            <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Nuevo Articulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="prod_idCat" class="col-form-label">Categoria:</label>
                            <select class="form-select" aria-label="Category select" id="prod_idCat" name="prod_idCat" required> 
                                <option value="" selected disabled>Ninguna</option>
                                <?php
                                    echo showCategories();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="prod_idProv" class="col-form-label">Proveedor:</label>
                            <select class="form-select" aria-label="Provider select" id="prod_idProv" name="prod_idProv" required>
                                <option value="" selected disabled>Ninguna</option>
                                <?php
                                    echo showProviders();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="prod_price" class="col-form-label">Precio:</label>
                            <input type="number" step="any" class="form-control" id="prod_price" name="prod_price" placeholder="100.00" required>
                        </div>
                        <div class="mb-3">
                            <label for="prod_stock" class="col-form-label">Stock:</label>
                            <input type="number" class="form-control" id="prod_stock" name="prod_stock" placeholder="100" required>
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
    <!-- New Article Modal -->

    <!-- Edit Article Modal -->
    <div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Articulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action="../controller/products/updateProduct.php">
                    <div class="modal-body">                        
                        <div class="mb-3 idInput">        
                            <label for="prod_idE" class="col-form-label">ID:</label>
                            <input type="text" class="form-control" id="prod_idE" name="prod_idE" readonly>
                        </div>
                        <div class="mb-3 nameInput">
                            <label for="prod_nameE" class="col-form-label">Nombre del Articulo:</label>
                            <input type="text" class="form-control" id="prod_nameE" name="prod_nameE" placeholder="Nuevo Articulo" required>
                        </div>
                        <div class="mb-3 catInput">
                            <label for="prod_idCatE" class="col-form-label">Categoria:</label>
                            <select class="form-select" aria-label="Category select" id="prod_idCatE" name="prod_idCatE" required> 
                                <option value="" selected disabled>Ninguna</option>
                                <?php
                                    echo showCategories();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 provInput">
                            <label for="prod_idProvE" class="col-form-label">Proveedor:</label>
                            <select class="form-select" aria-label="Provider select" id="prod_idProvE" name="prod_idProvE" required>
                                <option value="" selected disabled>Ninguna</option>
                                <?php
                                    echo showProviders();
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 priceInput">
                            <label for="prod_priceE" class="col-form-label">Precio:</label>
                            <input type="number" step=".01" class="form-control" id="prod_priceE" name="prod_priceE" placeholder="100.00" required>
                        </div>
                        <div class="mb-3 stockInput">
                            <label for="prod_stockE" class="col-form-label">Stock:</label>
                            <input type="number" class="form-control" id="prod_stockE" name="prod_stockE" placeholder="100" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    <!-- Edit Article Modal -->

    <!-- Delete Article Modal -->
    <div class="modal fade" id="delArticleModal" tabindex="-1" aria-labelledby="delArticleModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title message_error" id="exampleModalLabel">??Al eliminar este articulo podria afectar algunas ventas registradas!</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method='post' action="../controller/products/deleteProduct.php">
                    <div class="modal-body">
                        <div class="mb-3 idDelInput">        
                            <label for="prod_idD" class="col-form-label">ID del articulo por eliminar:</label>
                            <input type="text" class="form-control" id="prod_idD" name="prod_idD" readonly>
                        </div>
                        <h5>??Esta seguro que desea eliminar este articulo?</h5>
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
    <!-- Delete Article Modal -->
    
</body>
</html>