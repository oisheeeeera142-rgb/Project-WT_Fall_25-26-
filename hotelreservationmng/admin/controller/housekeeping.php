<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task       = htmlspecialchars($_POST['task']);
    $assignedTo = htmlspecialchars($_POST['assignedTo']);
    $status     = htmlspecialchars($_POST['status']);

    echo "<h2>Task Saved Successfully!</h2>";
    echo "<p><strong>Task:</strong> $task</p>";
    echo "<p><strong>Assigned To:</strong> $assignedTo</p>";
    echo "<p><strong>Status:</strong> $status</p>";
} else {
    echo "No data submitted.";
}
?>
