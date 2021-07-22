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
        <div class="row g-4">
            <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
	</div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>