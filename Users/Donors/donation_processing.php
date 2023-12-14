<?php
require_once 'C:\xampp\htdocs\GC_Implementation\sql\sqlhelpers.php';
require_once 'C:\xampp\htdocs\GC_Implementation\Users\Donors\helpers.php';
isLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"];
    if($amount < 10){
        $message = "Minimum value to donate is 10 Taka.";
        header("Location: dashboard.php?message=$message&messagetype=error");
        exit;
    }
    else{ 
        $status = donate($amount);
        if($status == TRUE){
            $message = "Donation Successful!";
            header("Location: dashboard.php?message=$message&messagetype=success");
        }
        else{
            $message = "An unexpected error occoured.";
            header("Location: dashboard.php?message=$message&messagetype=error");
        }
        
        exit;
    }
}
?>
