<?php
session_start();

$email = $password = "";
$emailError = $passwordError = $loginError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["email"])) {
$emailError = "Email is required";
    } else {
$email = test_input($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailError = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordError = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if (empty($emailError) && empty($passwordError)) {
    if (
    isset($_SESSION['email']) &&
    $_SESSION['email'] === $email
) {
$_SESSION['loggedin'] = true;
$cookie_time = time() + (20 * 24 * 60 * 60);
setcookie("uname", $name, $cookie_time, "/");
setcookie("email", $email, $cookie_time, "/");

if ($_SESSION['role'] === "Admin") {
header("Location: ../view/admindashboardh.php");
} else {
header("Location: ../view/guesdashboard.php");
    }
    exit();
        } else {
    $loginError = "Invalid email or password";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
