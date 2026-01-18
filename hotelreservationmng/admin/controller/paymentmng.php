<?php
$method = "";
$status = ""; 
$datetime = ""; 
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
if (empty($_POST["method"]) || empty($_POST["status"]) || empty($_POST["datetime"])) 
$error = "Please fill in all fields.";{
else {
$method   = $_POST["method"];
$status   = $_POST["status"];
$datetime = $_POST["datetime"];
}
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
echo "<h3>Input:</h3>";
echo "Method: " . $method . "<br>";
echo "Status: " . $status . "<br>";
echo "DateTime: " . $datetime . "<br>";
}
?> 



