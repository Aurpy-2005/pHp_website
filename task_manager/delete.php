<?php
session_start();
include('db.php');


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


if (isset($_GET['id'])) {
    $task_id = $_GET['id'];


    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = $conn->query($sql);
    $task = $result->fetch_assoc();

    if ($task['user_id'] != $user_id && $_SESSION['role'] != 'editor' && $_SESSION['role'] != 'admin') {
        echo "You do not have permission to delete this task.";
        exit();
    }

  
    $delete_sql = "DELETE FROM tasks WHERE id = $task_id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
