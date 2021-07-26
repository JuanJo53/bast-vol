<?php
    include '../../model/User.php';

    function updateUserData(){   
        $userId=$_POST['usr_idE'];
        $name=$_POST['usr_namee'];
        $lastname=$_POST['usr_last_namese'];
        $phone=$_POST['usr_phonee'];
        $email=$_POST['usr_emaile'];
        $username=$_POST['usr_usernamee'];
        $password=$_POST['usr_passworde'];
        $type=$_POST['usr_typee'];  
    
        $user = new User;
        $response = $user->updateUser($userId,$name,$lastname,$phone,$email,$username,$password,$type);
        return $response;
    }
    echo updateUserData();
    
    header('Location: ../../view/users.php');

?>