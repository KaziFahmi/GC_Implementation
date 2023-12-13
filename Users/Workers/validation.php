<?php
require_once '../../sql/sqlhelpers.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $donors = new Table("workers", "name", "email", "username", "password");
    $user_data = $donors->getOne('username', $username);
    if($user_data == null){
        $message = "User does not exist."; 
        header("Location: index.php?message=$message");
        exit;
    }
    else{
        if(hash('sha256', $password) == $user_data['password']){
            session_start();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['usertype'] = 'worker';
            $_SESSION['userdata'] = $user_data;
            header("Location: dashboard.php");
        }
        else{
            $message = "Invalid Password.";
            header("Location: index.php?message=$message");
            exit;
        }
    }
}
?>
