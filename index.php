<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>BAST-VOL</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="styles/main.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center ">
        <div class="col-12 col-md-6 offset-md-3 login-box">  
            <!-- /.login-logo -->
            <div class="card login-card text-dark bg-light mb-3">
              <div class="login-logo">
                <h1 class="title fs-1">BAST-VOL</h1> 
                <h2 class="subtitle">Equipamiento</h2>
              </div>
              <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesion</p>
                <form method="post" action='controller/login.php' >
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Usuario" name="USER">
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="PASSWORD">
                  </div>
                  <?php                  
                    session_start();
                    if(isset($_SESSION['LOGIN_STATUS'])){
                      if($_SESSION['LOGIN_STATUS']=='exito'){
                        header('Location: view/home.php');               
                      }else{
                        echo "<p class='login-error'>".$_SESSION['LOGIN_STATUS']."</p>";
                      }
                    }
                  ?>
                  <div class="row">
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.login-card-body -->
            </div>
        </div>
      </div>
    </div>
    <!-- /.login-box -->
  </body>
</html>