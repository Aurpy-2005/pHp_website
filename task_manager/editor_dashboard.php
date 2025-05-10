<?php
session_start();
include('db.php');

if ($_SESSION['role'] != 'editor') {
    header('Location: index.php');
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            text-align: center;
            margin-top: 100px;
            padding: 40px;
            background-color: #fff;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        h1 {
            color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Editor!</h1>
        <p>You have successfully logged in as an editor.</p>
    </div>
</body>
</html>