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
        $donations_received = get_funds();
        $work_table = new Table("work", "entry", "person_involved", "work_type", "amount", "status");
        $work_list = $work_table->getGroup('status', 'pending');

    ?>
    <h4>Current funds: <?php echo $donations_received; ?> Taka.</h4>
    <h4></h4>
    <div style="border: 1px solid #000; padding: 10px; display: inline-block; width: fit-content;">
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
                $script = "<label style='color:$exchangeColor'> $exchangeMessage </label>";
                echo $script;
            }
        ?>
        <form action="exchange_currency.php" method="post">
            Username: <input type="text" name="username"><br>
            Amount: <input type="number" name="amount"><br>
            <input type="submit" value="Exchange">
        </form>
    </div><br><br><br>


    <div style="border: 1px solid #000; padding: 10px; display: inline-block; width: fit-content;">
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
                $script = "<label style='color:$workColor'> $workMessage </label>";
                echo $script;
            }
        ?>
        <?php $style_string = "border-bottom: 1px solid #000;"; ?>
        <table style= <?php echo $style_string; ?> >
            <thead style= <?php echo $style_string; ?> >
                <tr style= <?php echo $style_string; ?> >
                <th style= <?php echo $style_string; ?> >Entry ID</th>
                <th style= <?php echo $style_string; ?> >Person Involved</th>
                <th style= <?php echo $style_string; ?> >Work Type</th>
                <th style= <?php echo $style_string; ?> >Amount</th>
                <th style= <?php echo $style_string; ?> >Accept</th>
                <th style= <?php echo $style_string; ?> >Deny</th>
                </tr>
            </thead>
            <tbody style= <?php echo $style_string; ?> >
                <?php foreach($work_list as $row): ?>
                <tr style= <?php echo $style_string; ?> >
                    <td style= <?php echo $style_string; ?> ><?php echo $row['entry']; ?></td>
                    <td style= <?php echo $style_string; ?> ><?php echo $row['person_involved']; ?></td>
                    <td style= <?php echo $style_string; ?> ><?php echo $row['work_type']; ?></td>
                    <td style= <?php echo $style_string; ?> ><?php echo $row['amount']; ?></td>
                    <td style= <?php echo $style_string; ?> >
                    <form action="work_verification.php" method="post">
                        <input type="hidden" name="entry" value="<?php echo $row['entry']; ?>">
                        <input type="hidden" name="verdict" value="TRUE">
                        <button type="submit">Accept</button>
                    </form>
                    </td>
                    <td style= <?php echo $style_string; ?> >
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