<?php
    require '../dbConnection.php';
    session_start();

    $user=$_POST['USER'];
    $password=$_POST['PASSWORD'];

    $sql = 'SELECT * FROM usuario WHERE USER="'.$user.'"';
    $result = $conn->query($sql);

    if ($result) { 
        if ($result->num_rows > 0) { 
            while ($row = $result->fetch_array()) { 
                if($password==$row['PASSWORD']){
                    $cod_usuario=$row['CODIGO'];                          
                    $_SESSION['CODIGO']=$cod_usuario;
                    $_SESSION['USUARIO']=$user;
                    $_SESSION['PASSWORD']=$row['PASSWORD'];
                    $_SESSION['TIPO']=$row['TIPO'];
                    $_SESSION['LOGIN_STATUS']='exito';
                    header('Location: ../index.php');
                }else{                    
                    $_SESSION['LOGIN_STATUS']= "Usuario o contraseña incorrecta";
                    header('Location: ../index.php');
                } 
            } 
            $result->free(); 
        }else{ 
            $_SESSION['LOGIN_STATUS']=  "El usuario no existe"; 
            header('Location: ../index.php');
        } 
    } else { 
        $_SESSION['LOGIN_STATUS'] = "ERROR: No se pudo ejecutar $sql. ".$conn->error; 
        header('Location: ../index.php');
    } 
    $conn->close();
?>