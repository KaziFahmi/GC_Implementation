<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:700&display=swap">
    <title>Your Green Website</title>
    <style>
        body {
            background-color: #cce5cc; /* Yellowish Green or Very Light Green */
            text-align: center;
            font-family: 'Roboto Slab', sans-serif;
            
        }

        h2{
            color: #004d00; /* Green color for the heading */
        }

        label {
            color: #004400; /* Dark green color for the label */
            
        }

        a {
            text-decoration: none;
        }

        button {
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
        button:hover {
            background-color: green;
        }


        @media (max-width: 600px) {
            button {
                max-width: none; /* Remove maximum width for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div>
        <?php
            echo "<h2>Helping the Forest of Earth</h2>";
            echo "<label>Select what kind of user you are: </label><br>";
        ?>

        <?php echo "<a href='Donors'><button>Donor</button></a><br>"; ?>
        <?php echo "<a href='Organization'><button>Organization</button></a><br>"; ?>
        <?php echo "<a href='Workers'><button>Worker</button></a><br>"; ?>
    </div>
</body>
</html>
