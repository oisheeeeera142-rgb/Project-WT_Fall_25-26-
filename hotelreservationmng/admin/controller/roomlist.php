<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$roomNumber = $_POST['roomNumber'];
$floor = $_POST['floor'];
$view = $_POST['view'];
$type = $_POST['type'];
$status = $_POST['status'];

echo "<h3>Room Added Successfully!</h3>";
echo "Room Number: $roomNumber <br>";
echo "Floor: $floor <br>";
echo "View: $view <br>";
echo "Type: $type <br>";
echo "Status: $status <br>";
}
?>