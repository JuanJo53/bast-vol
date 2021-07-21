<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAST-VOL | Inicio</title>
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
                echo "<h4 style='color:white;margin-right:10px;'>Hola ". $_SESSION['USUARIO']."</h4>";
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
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="#main">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="staticPages/proposito.html">Articulos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="staticPages/proposito.html">Clientes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="staticPages/proposito.html">Ventas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="staticPages/proposito.html">Usuarios</a>
					</li>
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
                    <button class="btn btn-danger text-md-" type="submit">Cerrar Sesion</button>
                </form>
			</div>
		</div>
	</nav>
	<!--header-->
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-dark">
				<div id="alimentoDiario" class="position-sticky sticky-top text-center text-white mt-4 margin:2rem">
					<br />
					<br />
					<h5>
						ALIMENTO DIARIO
					</h5>
					<h3>02</h3>
					<span>Lunes</span>
					<p>
						La paga del pecado es muerte, mas la dádiva de Dios es vida eterna en Cristo Jesús Señor nuestro.
					</p>
					<span>
						Romanos 6:23
					</span>
				</div>
			</nav>
			<!--Noticias Todas-->
			<section id="noticias-todas" class="mt-4 col-md-10">
				<div class="container">
					<div class="row">
						<div class="col text-center text-uppercase">
							<small>Mira las</small>
							<h2>Noticias</h2>
						</div>
					</div>
					<div class="row">
					<?php
                        require 'conexionBD.php';
                        $data = "SELECT * FROM noticias";
                        $dataResult = $conn->query($data);
                        if($dataResult->num_rows>0){
                            while($row=$dataResult->fetch_array()){?>
                                <div class="col-sm-6 col-lg-6 col-md-2 mb-4 mt-4">
                                    <div data-target="codigo" id="<?php echo $row['cod_noticia'];?>" class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong data-target="titulo" id="titulo<?php echo $row['cod_noticia'];?>"><?php echo $row['titulo'];?></strong></h5>
                                            <div class="badge">
                                                <?php 
                                                    $categoria=$row['cod_categoria'];
                                                    $cat = "SELECT * FROM categorias_noticias WHERE cod_categoria='$categoria'";
                                                    $dataResultCat = $conn->query($cat);
                                                    if($dataResultCat->num_rows>0){
                                                        while($rowCat=$dataResultCat->fetch_array()){
                                                            switch($rowCat['categoria']){
                                                                case 'Profesias':
                                                                    echo "<span class='badge badge-info' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                    break;
                                                                case 'Desastres Naturales':
                                                                    echo "<span class='badge badge-secondary' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                    break;
                                                                case 'Israel':
                                                                    echo "<span class='badge badge-primary' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                    break;
                                                                case 'Ciencia y Tecnologia':
                                                                    echo "<span class='badge badge-success' data-target='categoria' id='categoria".$row['cod_noticia']."'>".$rowCat['categoria']."</span>";
                                                                    break;
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <p class="card-text" data-target="contenido" id="contenido<?php echo $row['cod_noticia'];?>">
                                            <?php echo $row['contenido'];?>
                                            </p>
                                            <div class="d-flex bd-highlight mb-3">    
                                                <a target="_blank" href="<?php echo $row['enlace_noticia'];?>" data-target="enlace" id="enlace<?php echo $row['cod_noticia'];?>" class="mr-auto p-2 bd-highlight btn btn-outline-primary"
                                                    >Ver Noticia Original</a
                                                >                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    ?>
					</div>
				</div>
			</section>
			<!--Noticias Todas-->
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script>
		$(function () {
			$('[data-toggle="tooltip"').tooltip();
		});
		$(function () {
			$(".sticky-content").sticky({
				topSpacing: 50,
				zIndex: 2,
				stopper: "#footer"
			});
		});
	</script>
</body>
</html>