<?php
    require_once 'helpers.php';
    isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #cce5cc; /* Light green background */
            margin: 0;
            padding: 0;
            color: #333; /* Dark text color */
        }

        h1, h2, h3, h4 {
            color: #004d00; /* Forest green heading color */
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

        .amountset {
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

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color:white
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #228b22; /* Forest green table header color */
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternate row color */
        }
    </style>
</head>
<?php include 'navbar.php'; ?>

<body>
    <a href='logout.php'><button>Log Out</button></a>
    <h1>Dashboard</h1>
    <?php
        $donations_received = get_funds();
        $work_table = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
        $work_list = $work_table->getGroup('status', 'pending');
    ?>
    <h4>Current funds: <?php echo $donations_received; ?> Taka.</h4>
    
    <div>
        <h3>Exchange tokens for cash:</h3>
        <?php 
            if (isset($_GET["exchangeMessage"])){
                $exchangeMessage = urldecode($_GET["exchangeMessage"]);
                $exchangeMessageType = (urldecode($_GET['exchangeMessageType']));
                if($exchangeMessageType == 'success'){
                    $exchangeColor = 'green';
                }
                else{
                    $exchangeColor = 'red';
                }
                $script = "<label style='color:$exchangeColor;text-align:center'> $exchangeMessage </label>";
                echo $script;
            }
        ?>
        <form class="amountset" action="exchange_currency.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username">
            <label for="amount">Amount:</label>
            <input type="number" name="amount">
            <input type="submit" value="Exchange">
        </form>
    </div>

    <div>
        <h3>Work to be reviewed:</h3>
        <?php 
            if (isset($_GET["workMessage"])){
                $workMessage = urldecode($_GET["workMessage"]);
                $workMessageType = (urldecode($_GET['workMessageType']));
                if($workMessageType == 'success'){
                    $workColor = 'green';
                }
                else{
                    $workColor = 'red';
                }
                $script = "<label style='color:$workColor;text-align:center'> $workMessage </label>";
                echo $script;
            }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Entry ID</th>
                    <th>Person Involved</th>
                    <th>Work Type</th>
                    <th>Amount</th>
                    <th>Accept</th>
                    <th>Deny</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($work_list as $row): ?>
                <tr>
                    <td><?php echo $row['entry']; ?></td>
                    <td><?php echo $row['person_involved']; ?></td>
                    <td><?php echo $row['work_type']; ?></td>
                    <td><?php echo $row['amount']; ?></td>
                    <td>
                        <form action="work_verification.php" method="post">
                            <input type="hidden" name="entry" value="<?php echo $row['entry']; ?>">
                            <input type="hidden" name="verdict" value="TRUE">
                            <button type="submit">Accept</button>
                        </form>
                    </td>
                    <td>
                        <form action="work_verification.php" method="post">
                            <input type="hidden" name="entry" value="<?php echo $row['entry']; ?>">
                            <input type="hidden" name="verdict" value="FALSE">
                            <button type="submit">Deny</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
