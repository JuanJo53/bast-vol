<?php
    include '../../model/User.php';
    
    function removeUser(){
        $userId=$_POST['usr_idD'];
        $user = new User;
        $response = $user->deleteUser($userId);
        return $response;
    }
    echo removeUser();
    
    header('Location: ../../view/users.php');

?>