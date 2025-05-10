<?php
session_start();
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$sql = "SELECT * FROM tasks WHERE user_id = $user_id ORDER BY created_at DESC";
$result = $conn->query($sql);


if ($result === false) {
    echo "Error executing query: " . $conn->error;
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1, h2 {
            text-align: center;
            color: #444;
        }

        .actions {
            text-align: center;
            margin-bottom: 20px;
        }

        .actions a {
            margin: 0 10px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        td a {
            color: #007BFF;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .no-tasks {
            text-align: center;
            color: #777;
            padding: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?></h1>

        <div class="actions">
            <a href="create.php">Add New Task</a> |
            <a href="logout.php">Logout</a>
        </div>

        <h2>Your Tasks</h2>

        <table>
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . htmlspecialchars($row['task_name']) . "</td>
                            <td>" . htmlspecialchars($row['status']) . "</td>
                            <td>" . htmlspecialchars($row['created_at']) . "</td>
                            <td>
                                <a href='update.php?id={$row['id']}'>Edit</a> |
                                <a href='delete.php?id={$row['id']}'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-tasks'>No tasks available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>