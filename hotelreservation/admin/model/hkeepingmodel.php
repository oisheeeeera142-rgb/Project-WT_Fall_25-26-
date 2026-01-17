<?php
include "db.php";


// Get all tasks
function getAllTasks($conn) {
    $sql = "SELECT * FROM housekeeping_tasks";
    return mysqli_query($conn, $sql);
}

// Get task by ID
function getTaskById($conn, $id) {
    $sql = "SELECT * FROM housekeeping_tasks WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
}

// Add new task
function addTask($conn, $room_id, $task, $assigned_to) {
    $sql = "INSERT INTO housekeeping_tasks (room_id, task, assigned_to, status, start_time, end_time)
            VALUES ('$room_id','$task','$assigned_to','Pending',NULL,NULL)";
    return mysqli_query($conn, $sql);
}

// Update task status
function updateTaskStatus($conn, $id, $status) {
    $end_time = ($status == 'Done') ? date("Y-m-d H:i:s") : NULL;
    $sql = "UPDATE housekeeping_tasks SET status='$status', end_time='$end_time' WHERE id=$id";
    return mysqli_query($conn, $sql);
}

// Delete task
function deleteTask($conn, $id) {
    $sql = "DELETE FROM housekeeping_tasks WHERE id=$id";
    return mysqli_query($conn, $sql);
}
?>
