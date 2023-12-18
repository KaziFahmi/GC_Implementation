<?php
require_once 'helpers.php';
isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #cce5cc; /* Light green background */
            margin: 0;
            padding: 0;
            color: #333; /* Dark text color */
        }

        h1, h2, h3, h4 {
            color: Red; /* Dark green text color */
            text-align: center/* Forest green heading color */
        }
        label{
            text-align: center
        }

        .payment {
            display: block;
            width: 100%;
            max-width: 200px; /* Adjust the maximum width as needed */
            margin: 10px auto;
            padding: 60px;
            font-size: 16px;
            border: 1px solid white;
            background-color: #004d00; /* Green color for the buttons */
            color: #fff; /* White text color for the buttons */
            cursor: pointer;
            text-align: center;
            font-family: 'Roboto Slab', sans-serif;

        }

        .logout {
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

        input {
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
    </style>
</head>
<?php include 'inside_navbar.php'; ?>
<body>
 <a href='logout.php'><button class="logout">Log Out</button></a>
    <h2>Not yet added</h2>
</body>
</html>
