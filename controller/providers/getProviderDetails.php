<?php
    include '../../model/User.php';
    
    function showUserDetails(){
        $userId=$_GET['usr_idEdit'];
        $user = new User;
        $userData = $user->getUserById($userId);
        $response=$userData->fetch_assoc();
        return json_encode($response);
    }
    echo showUserDetails();

?>