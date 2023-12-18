<!DOCTYPE html>
<html>
<head>
    <title>Worker Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
    <style>
        body {
            background-color: #cce5cc; /* Light green background color */
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #004d00; /* Dark green text color */
            text-align: center
        }

        form {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Light shadow */
            margin-top: 20px;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green submit button color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #004d00; /* Dark green text color for the link */
            text-decoration: none;
        }
        .acc_button{
          
          width:250px;
          justify-content: center;
          align-items: center;
          margin: 0 auto;
          
      }

        button {
            background-color: #4CAF50; /* Green button color */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<?php include 'navbar.php'; ?>
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

    <div class="acc_button">
        <a href='../'><button>Don't have an account? Create one!</button></a>
    </div>
    
</body>
</html>