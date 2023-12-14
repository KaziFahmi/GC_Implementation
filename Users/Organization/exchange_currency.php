<?php
require_once 'C:\xampp\htdocs\GC_Implementation\Users\Organization\helpers.php';
isLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $amount = $_POST["amount"];
    pay_incentive($username, $amount);
}
?>
