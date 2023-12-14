<?php
require_once 'C:\xampp\htdocs\GC_Implementation\Users\Organization\helpers.php';
isLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry = $_POST['entry'];
    $verdict = $_POST["verdict"];
    if($verdict == "TRUE"){
        $incentiveStatus = provide_incentive($entry);
        if($incentiveStatus){
            $acceptanceStatus = accept_work($entry);
            if($acceptanceStatus){
                $message = urlencode("Work accepted and incentive provided.");
                $messageType = urlencode("success");
                header("Location: dashboard.php?workMessage=$message&workMessageType=$messageType");
                exit;
            }
        }
        else{
            $message = urlencode("Insufficient funds.");
            $messageType = urlencode("error");
            header("Location: dashboard.php?workMessage=$message&workMessageType=$messageType");
            exit;
        }
    }
    else{
        reject_work($entry);
        $message = urlencode("Work rejected.");
        $messageType = urlencode("success");
        header("Location: dashboard.php?workMessage=$message&workMessageType=$messageType");
        exit;
    }
}
?>