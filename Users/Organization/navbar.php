<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:700&display=swap">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto Slab', sans-serif;

        }

        header {
            background-image: url('https://img.freepik.com/free-vector/copy-space-bokeh-spring-lights-background_52683-55649.jpg?w=900&t=st=1702820625~exp=1702821225~hmac=9675ddbfd650d7c78f21d54053772f76ddc3980d55ad626ffc9d128c1c14aafb');
            background-color: #333;
            padding: 10px;
            text-align: center;
            background-size: cover;
            background-position: center;
            
        }
        .webtitle{
            color:green;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #004d00;
        }

        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        nav a:hover {
            background-color: green;
        }
    </style>
</head>
<body>

    <header>
        <h1 class="webtitle">GreenLink</h1>
    </header>

    <nav>
    <a href="<?php 
        session_start();
        if(isset($_SESSION['loggedin']) && isset($_SESSION['usertype'])){
            if ($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'organization'){
                $redirect = 'dashboard.php';
            }
        }
        else{
            $redirect = '../index.php';
        }
        echo $redirect; ?>">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <?php 
            if(isset($_SESSION['loggedin']) && isset($_SESSION['usertype'])){
                if ($_SESSION['loggedin'] == TRUE && $_SESSION['usertype'] == 'organization'){
                   echo "<a href='register'>Create an Organizational Account</a>";
                }
            }
         ?>
    </nav>

    <!-- The rest of your page content goes here -->

</body>
</html>
