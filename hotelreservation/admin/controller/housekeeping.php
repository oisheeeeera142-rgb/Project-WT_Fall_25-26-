<?php
include("../model/hkeepingmodel.php");

$success = "";
$error = "";

// Add Task
if (isset($_POST['add'])) {
    if (addTask($conn, $_POST['room_id'], $_POST['task'], $_POST['assigned_to'])) {
        // নতুন কাজ assign হলে Room status Cleaning করে দিন
        mysqli_query($conn, "UPDATE rooms SET status='Cleaning' WHERE id={$_POST['room_id']}");
        $success = "Task added successfully and room marked as Cleaning!";
    } else {
        $error = "Error adding task!";
    }
}

// Update Task
if (isset($_POST['update'])) {
    if (updateTask($conn, $_POST['id'], $_POST['room_id'], $_POST['task'], $_POST['assigned_to'], $_POST['status'])) {
        // Task status অনুযায়ী Room status আপডেট করুন
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

// Delete Task
if (isset($_GET['delete'])) {
    if (deleteTask($conn, $_GET['delete'])) {
        $success = "Task deleted successfully!";
    } else {
        $error = "Error deleting task!";
    }
}

// Fetch all tasks
$tasks = getAllTasks($conn);

// Edit form এর জন্য নির্দিষ্ট Task আনুন
if (isset($_GET['edit'])) {
    $edit_task = getTaskById($conn, $_GET['edit']);
}
?>
