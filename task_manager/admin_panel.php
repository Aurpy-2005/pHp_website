<?php
include('db.php');
session_start();


if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

if (isset($_GET['approve_id'])) {
    $user_id = $_GET['approve_id'];
    $sql = "UPDATE users SET status='approved' WHERE id=$user_id";
    $conn->query($sql);
    
    mail($user_email, "Account Approved", "Your account has been approved by Admin.");
    header('Location: admin_panel.php');
    exit();
}

if (isset($_GET['reject_id'])) {
    $user_id = $_GET['reject_id'];
    $sql = "UPDATE users SET status='rejected' WHERE id=$user_id";
    $conn->query($sql);
  
    mail($user_email, "Account Rejected", "Your account has been rejected by Admin.");
    header('Location: admin_panel.php');
    exit();
}

$sql = "SELECT * FROM users WHERE status = 'pending'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #eee;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin: 0 5px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Admin Panel</h1>
    <h2>Pending Users</h2>
    <table>
        <tr>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['role']) ?></td>
                <td>
                    <a href="admin_panel.php?approve_id=<?= $row['id'] ?>">Approve</a> |
                    <a href="admin_panel.php?reject_id=<?= $row['id'] ?>">Reject</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>