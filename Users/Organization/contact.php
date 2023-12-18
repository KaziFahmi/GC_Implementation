<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #cce5cc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #4285f4; /* Google Blue */
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            color: #004d00; /* Google Blue */
        }

        p {
            line-height: 1.6;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #004d00; /* Google Blue */
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #228b22; /* Google Blue */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #004d00; /* Darker Google Blue */
        }
    </style>
</head>
<?php include 'navbar.php'; ?>
<body>
    <main>
        <section>
            <h2>Contact Us</h2>
            <p>Feel free to reach out to us with any inquiries or feedback. We'd love to hear from you!</p>
        </section>

        <section>
            <form action="process_contact.php" method="post">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
</body>
</html>
