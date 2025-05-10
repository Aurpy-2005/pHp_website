<?php
session_start();
include('db.php');


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];


    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();

    if ($task['user_id'] != $user_id && $_SESSION['role'] != 'editor' && $_SESSION['role'] != 'admin') {
        echo "You do not have permission to edit this task.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $task_name = $_POST['task_name'];
        $status = $_POST['status'];

        $update_sql = "UPDATE tasks SET task_name = '$task_name', status = '$status' WHERE id = $task_id";
        if ($conn->query($update_sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #444;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #555;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #333;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="update.php?id=<?php echo $task['id']; ?>" method="POST">
            <label for="task_name">Task Name:</label>
            <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required><br><br>

            <label for="status">Status:</label>
            <select name="status">
                <option value="pending" <?php echo ($task['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="completed" <?php echo ($task['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
            </select><br><br>

            <input type="submit" value="Update Task">
        </form>
        <a href="index.php">Back to Task List</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>