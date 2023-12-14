<?php
require_once 'C:\xampp\htdocs\GC_Implementation\Blockchain\helpers.php';
function isLoggedIn()
{
    session_start();
    if ($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'donor') {
        return TRUE;
    } else {
        $message = "Unauthorized Access.";
        header("Location: index.php?message=$message");
        exit;
    }
}

function get_amount_donated()
{
    $user_name = $_SESSION['userdata']['username'];
    $amount_donated = get_donation_sum($user_name);
    if ($amount_donated == null) {
        $amount_donated = 0;
    }
    return $amount_donated;
}
