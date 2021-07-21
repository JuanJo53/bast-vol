<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BAST-VOL | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="panel.php"><b>BAST-VOL</b>Equipamiento</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Iniciar Sesion</p>
      <?php
        if (isset($_REQUEST['login'])) {
          session_start();
          $usname = $_REQUEST['USER'] ?? '';
          $pasword = $_REQUEST['PASSWORD'] ?? '';
          $pasword = md5($pasword);
          include_once "conexion.php";
          $con = mysqli_connect($host, $user, $pass, $db);
          $query = "SELECT CODIGO, USER, NOMBRES from usuario where USER='" . $usname . "' and PASSWORD='" . $pasword . "';  ";
          $res = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($res);
          if ($row) {
            $_SESSION['CODIGO'] = $row['CODIGO'];
            $_SESSION['USER'] = $row['USER'];
            $_SESSION['NOMBRES'] = $row['NOMBRES'];
            header("location: panel.php");
          } else {
        ?>
            <div class="alert alert-danger" role="alert">
              Error de login
            </div>
        <?php
          }
        }
        ?>  
      <form method="post" action='panel.php' >
        <div class="input-group mb-3">
          <input type="usuario" class="form-control" placeholder="Usuario" name="USER">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="PASSWORD">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>