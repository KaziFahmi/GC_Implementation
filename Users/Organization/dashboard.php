<?php
    require_once 'helpers.php';
    isLoggedIn();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Organization Dashboard</title>
</head>
<body>
    <a href='logout.php'><button>Log Out</button></a> 
    <h1>Dashboard</h1>
    <?php
        $incentive_received = get_incentive_received();
    ?>
    <h2>Your contributions play a crucial role towards the well being of the earth.</h2>
    <h4>You have <?php echo $incentive_received; ?> Taka of incentives in your account.<br>
        Contact the authorities to withdraw your incentives</h4>
    <h4></h4>
    <div>
        <h3>Report Work:</h3>
        <?php 
            if (isset($_GET["message"])){
                $message = urldecode($_GET["message"]);
                $messagetype = (urldecode($_GET['messagetype']));
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
        <form action="work_processing.php" method="post">
            Type of Work: <select id="choice" name="choice">
                            <option value="reforestation">Reforestation</option>
                            <option value="conservation">Forest Conservation</option>
                         </select><br>
            Amount: <input type="number" name="amount"> Acres<br>
            <input type="submit" value="Report">
        </form>
    </div>
    
</body>
</html>