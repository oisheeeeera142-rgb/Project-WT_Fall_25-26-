<?php
session_start();

$name = $email = $password = $role = "";
$nameError = $emailError = $passwordError = $roleError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name"])) {
        $nameError = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[A-Za-z][A-Za-z.\-]*(\s+[A-Za-z.\-]+)+$/", $name)) {
            $nameError = "Name must contain at least two words and valid characters";
        }
    }

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
        $password = ($_POST["password"]);
        if (strlen($password) < 6) {
            $passwordError = "Password must be at least 6 characters";
        }
    }
    if (empty($_POST["role"])) {
        $roleError = "Role is required";
    } else {
        $role = test_input($_POST["role"]);
    }

    if (empty($nameError) && empty($emailError) && empty($passwordError) && empty($roleError)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        $cookie_time = time() + (20 * 24 * 60 * 60);
        setcookie("uname", $name, $cookie_time, "/");
        setcookie("email", $email, $cookie_time, "/");


header("Location: ../view/loginh.php"); 
exit();
}
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
