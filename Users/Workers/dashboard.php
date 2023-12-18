<?php
    require_once 'helpers.php';
    isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #cce5cc; /* Light green background */
            margin: 0;
            padding: 0;
            color: #333; /* Dark text color */
        }

        h1, h2, h3, h4 {
            color: #004d00; /* Dark green text color */
            text-align: center
        }

        button {
            background-color: #228b22; /* Forest green button color */
            color: #fff;
            padding: 8px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2e8b57; /* Darker green on hover */
        }

        form {
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff; /* White form background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #228b22; /* Forest green submit button color */
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2e8b57; /* Darker green on hover */
        }

        h4 {
            margin-top: 20px;
        }
    </style>
</head>
<?php include 'navbar.php'; ?>

<body>
    <a href='logout.php'><button>Log Out</button></a>
    <h1>Dashboard</h1>
    <?php
        $incentive_received = get_incentive_received();
        $work_table = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
        $username = $_SESSION['userdata']['username'];
        $work_list = $work_table->getGroup('person_involved', $username);
    ?>
    <h2>Your contributions play a crucial role towards the well-being of the earth.</h2>
    <h4>You have <?php echo $incentive_received; ?> Taka of incentives in your account.<br>
        Contact the authorities to withdraw your incentives</h4>

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
                $script = "<label style='color:$color; text-align:center'> $message </label>";
                echo $script;
            }
        ?>
        <form action="work_processing.php" method="post">
            <label for="choice">Type of Work:</label>
            <select id="choice" name="choice">
                <option value="reforestation">Reforestation</option>
                <option value="conservation">Forest Conservation</option>
            </select><br>
            <label for="amount">Land worked on (in acres):</label>
            <input type="number" name="amount"> <br>
            <input type="submit" value="Report">
        </form>
    </div>
</body>
</html>
