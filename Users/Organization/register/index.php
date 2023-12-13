<!DOCTYPE html>
<html>
<head>
    <title>Organization Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <?php 
        if (isset($_GET["message"])){
            $message = $_GET["message"];
            $script = "<label style='color:red'> $message </label>";
            echo $script;
        }
    ?>

    <form action="validation.php" method="post">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Register">
    </form>

    <?php echo "<a href='../'><button>Already have an account? Log In!</button></a>"; ?>
    
</body>
</html>