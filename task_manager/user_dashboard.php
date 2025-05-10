<?php
session_start();
include('db.php');

if ($_SESSION['role'] != 'user') {
    header('Location: index.php');
    exit();
}

echo "<h1>Welcome, user!</h1>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 500px;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #444;
        }

        p {
            font-size: 18px;
            margin-top: 20px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            margin-top: 20px;
            display: block;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome, User!</h1>
    <p>You have logged in as a user. Feel free to explore your dashboard.</p>
    <a href="index.php">Go to Dashboard</a>
</div>

</body>
</html>