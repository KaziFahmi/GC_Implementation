<?php
require_once '../../../sql/sqlhelpers.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST['email'];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $donors = new Table("donors", "name", "email", "username", "password");
    $user_data = $donors->getOne('username', $username);
    if($user_data == null){
        $donors->insert($name, $email, $username, hash('sha256', $password));
        $user_data = $donors->getOne('username', $username);
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['usertype'] = 'donor';
        $_SESSION['userdata'] = $user_data;
        header("Location: ../dashboard.php");
    }
    else{ 
        $message = "User already exists! Try a different username.";
        header("Location: index.php?message=$message");
        exit;
    }
}
?>
