<?php
require_once 'C:\xampp\htdocs\GC_Implementation\Users\Workers\helpers.php';
isLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $work_type = $_POST['choice'];
    $amount = $_POST["amount"];
    report_work($amount, $work_type);
    $message = urlencode("Your work has been Successfully reported. The organization will contact you to verify your work.");
    $messageType = urlencode("success");
    header("Location: dashboard.php?message=$message&messagetype=$messageType");   
    exit;
}
?>
