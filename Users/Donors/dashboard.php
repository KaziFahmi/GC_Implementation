<?php
require_once 'helpers.php';
isLoggedIn();
echo "<h1>Donor Dashboard</h1><br>";
$amount_donated = get_amount_donated();
echo "<label>You have donated $amount_donated Taka towards the well being of the earth.</label><br>";
echo "<label>Your contributions are very well appreciated..</label><br>";
