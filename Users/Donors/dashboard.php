<?php
require_once 'helpers.php';
isLoggedIn();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Dashboard</title>
</head>
<body>
    <a href='logout.php'><button>Log Out</button></a> 
    <h1>Dashboard</h1>
    <?php
        $amount_donated = get_amount_donated();
    ?>
    <h2>Your contributions play a crucial role towards the well being of the earth.</h2>
    <h4>Amount donated by you so far: <?php echo $amount_donated ?> Taka </h4>
    <h3>Donate Money:</h3>
    <?php 
        if (isset($_GET["message"])){
            $message = urldecode($_GET["message"]);
            $messagetype = urldecode($_GET['messagetype']);
            if($messagetype == 'success'){
                $color = 'green';
            }
            else{
                $color = 'red';
            }
            $script = "<label style='color:$color'> $message </label>";
            echo $script;
        }
    ?>
    <form action="donation_processing.php" method="post">
        Amount: <input type="number" name="amount"><br>
        <input type="submit" value="Donate">
    </form>
    
</body>
</html>