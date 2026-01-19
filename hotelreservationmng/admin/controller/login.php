<?php
session_start();
$email = $password = $role = "";
$emailError = $passwordError = $roleError = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = trim($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailError = "Invalid email format";
}
}
if (empty($_POST["password"])) {
$passwordError = "Password is required";
} else {
$password = trim($_POST["password"]);
if (strlen($password) < 6) {
$passwordError = "Password must be at least 6 characters";
}
}
if (empty($_POST["role"])) {
$roleError = "Role is required";
} else {
$role = trim($_POST["role"]);
}
if (empty($emailError) && empty($passwordError) && empty($roleError)) {
$_SESSION['loggedin'] = true;
$_SESSION['email'] = $email;
$_SESSION['role'] = $role;
if ($role === "Admin") {
header("Location: ../View/admindashboardh.php");
exit();
} else {
header("Location: ../View/guestdashboard.php");
exit();
}
}
}
?>
