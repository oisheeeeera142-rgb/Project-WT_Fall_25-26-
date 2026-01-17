<?php
include("../model/hkeepingmodel.php");

$success = "";
$error = "";

if (isset($_POST['add'])) {
    if (addTask($conn, $_POST['room_id'], $_POST['task'], $_POST['assigned_to'])) {

        mysqli_query($conn, "UPDATE rooms SET status='Cleaning' WHERE id={$_POST['room_id']}");
        $success = "Task added successfully and room marked as Cleaning!";
    } else {
        $error = "Error adding task!";
    }
}
if (isset($_POST['update'])) {
    if (updateTask($conn, $_POST['id'], $_POST['room_id'], $_POST['task'], $_POST['assigned_to'], $_POST['status'])) {
        if ($_POST['status'] == 'Done') {
            mysqli_query($conn, "UPDATE rooms SET status='Available' WHERE id={$_POST['room_id']}");
        } else {
            mysqli_query($conn, "UPDATE rooms SET status='Cleaning' WHERE id={$_POST['room_id']}");
        }
        $success = "Task updated successfully!";
    } else {
        $error = "Error updating task!";
    }
}

if (isset($_GET['delete'])) {
    if (deleteTask($conn, $_GET['delete'])) {
        $success = "Task deleted successfully!";
    } else {
        $error = "Error deleting task!";
    }
}


$tasks = getAllTasks($conn);

if (isset($_GET['edit'])) {
    $edit_task = getTaskById($conn, $_GET['edit']);
}
?>
