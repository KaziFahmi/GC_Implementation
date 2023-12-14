<?php
require_once 'C:\xampp\htdocs\GC_Implementation\Users\Donors\helpers.php';
isLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"];
    if($amount < 10){
        $message = urlencode("Minimum value to donate is 10 Taka.");
        $messageType = urlencode("error");
        header("Location: dashboard.php?message=$message&messagetype=$messageType");
        exit;
    }
    else{ 
        $status = donate($amount);
        if($status == TRUE){
            $message = urlencode("Donation Successful!");
            $messageType = urlencode("success");
            header("Location: dashboard.php?message=$message&messagetype=$messageType");
        }
        else{
            $message = urlencode("An unexpected error occoured.");
            $messageType = urlencode("error");
            header("Location: dashboard.php?message=$message&messagetype=$messageType");
        }
        
        exit;
    }
}
?>
