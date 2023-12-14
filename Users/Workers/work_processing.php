<?php
require_once 'C:\xampp\htdocs\GC_Implementation\Users\Workers\helpers.php';
isLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $work_type = $_POST['choice'];
    $amount = $_POST["amount"];
    $status = report_work($amount, $work_type);
    if($status == TRUE){
        $message = urlencode("Your work has been Successfully reported. The organization will contact you to verify your work.");
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
?>
