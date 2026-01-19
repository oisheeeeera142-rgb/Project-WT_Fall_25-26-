<?php
session_start();
include("../model/usersmodel.php");

header('Content-Type: application/json');

$response = [
    "success" => false,
    "message" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name     = trim($_POST["name"] ?? "");
    $email    = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $role     = trim($_POST["role"] ?? "");

    if (empty($name)) {
        $response["message"] = "Name is required";
    } 
    elseif (!preg_match("/^[A-Za-z][A-Za-z.\-]*(\s+[A-Za-z.\-]+)+$/", $name)) {
        $response["message"] = "Name must contain at least two words";
    } 
    elseif (empty($email)) {
        $response["message"] = "Email is required";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "Invalid email format";
    } 
    elseif (empty($password)) {
        $response["message"] = "Password is required";
    } 
    elseif (strlen($password) < 6) {
        $response["message"] = "Password must be at least 6 characters";
    } 
    elseif (empty($role)) {
        $response["message"] = "Role is required";
    } 
    else {

        if (emailExists($email, $conn)) {
            $response["message"] = "Email already registered. Please login.";
        } 
        else {
            if (registerUser($name, $email, $password, $role, $conn)) {

                session_regenerate_id(true);

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $name;
                $_SESSION['email']    = $email;
                $_SESSION['role']     = $role;

                $cookie_time = time() + (20 * 24 * 60 * 60);
                setcookie("username", $name, $cookie_time, "/");
                setcookie("email", $email, $cookie_time, "/");
                setcookie("role", $role, $cookie_time, "/");

                $response["success"] = true;
                $response["message"] = "Registration successful!";
                $response["role"]    = $role;

            } else {
                $response["message"] = "Registration failed. Please try again.";
            }
        }
    }
}

echo json_encode($response);
