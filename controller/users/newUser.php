<?php
    include '../../model/User.php';

    $name=$_POST['usr_name'];
    $lastname=$_POST['usr_last_names'];
    $phone=$_POST['usr_phone'];
    $email=$_POST['usr_email'];
    $username=$_POST['usr_username'];
    $password=$_POST['usr_password'];
    $type=$_POST['usr_type'];

    $user = new User;
    $result = $user->newUser($name,$lastname,$phone,$email,$username,$password,$type);
    echo $result;
    header('Location: ../../view/users.php');

?>