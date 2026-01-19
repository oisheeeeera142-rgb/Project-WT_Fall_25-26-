<?php
session_start();
include("../model/usersmodel.php");
header('Content-Type: application/json');
$response = ["success" => false, "message" => ""];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email    = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($email) || empty($password)) {
        $response["message"] = "Email and password are required";
    } else {
        $user = getUserByEmail($email, $conn);
        if ($user && password_verify($password, $user["password"])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user["name"];
            $_SESSION['email']    = $user["email"];
            $_SESSION['role']     = $user["role"];
            $cookie_time = time() + (7 * 24 * 60 * 60);
            setcookie("username", $user["name"], $cookie_time, "/");
            setcookie("email", $user["email"], $cookie_time, "/");
            setcookie("role", $user["role"], $cookie_time, "/");

            $response["success"] = true;
            $response["message"] = "Login successful!";
            $response["role"]    = $user["role"];
        } else {
            $response["message"] = "Invalid email or password";
        }
    }
}
echo json_encode($response);
