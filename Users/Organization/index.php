<!DOCTYPE html>
<html>
<head>
    <title>Organization Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php 
        if (isset($_GET["message"])){
            $message = $_GET["message"];
            $script = "<label style='color:red'> $message </label>";
            echo $script;
        }
    ?>

    <form action="validation.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>

    <?php echo "<a href='register'><button>Don't have an account? Create one!</button></a>"; ?>
    
</body>
</html>