<head?>
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

        .account_information{
            color: Green; /* Dark green text color */
            text-align: left;/* Forest green heading color */
            margin:0 auto;
            align-items: center;
            justify-content: center;
            width: 400px;

        }
    </style>
</head>

<?php
require_once '../../../sql/sqlhelpers.php';
include 'navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST['email'];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $donors = new Table("organization", "name", "email", "username", "password");
    $user_data = $donors->getOne('username', $username);
    if($user_data == null){
        $donors->insert($name, $email, $username, hash('sha256', $password));
        $user_data = $donors->getOne('username', $username);
        echo "<h2>Account Successfully Created</h2><br>";
        echo "<div class='account_information'>";
            echo "<h3>Account Information:</h2><br>";
            echo "Name: " . $name . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Username: " . $username . "<br>";
            echo "Password: " . $password . "<br>";
            echo "Provide the authorized user with these credentials.<br>";
        echo "</div>";
    }
    else{ 
        $message = "User already exists! Try a different username.";
        header("Location: index.php?message=$message");
        exit;
    }
}
?>
