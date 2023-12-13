<?php
    require_once "helpers.php";
    isLoggedIn();
    // session_start(); 
    session_destroy(); 
    header("Location: index.php");
?>