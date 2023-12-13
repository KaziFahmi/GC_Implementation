<?php

    function isLoggedIn(){
        session_start();
        if($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'organization'){
            return TRUE;
        }
        else{
            $message = "Unauthorized Access.";
            header("Location: index.php?message=$message");
            exit;
        }

    }
?>