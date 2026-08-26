<?php
session_start();

if (
    empty($_SESSION['loggedin']) ||
    $_SESSION['loggedin'] !== true ||
    empty($_SESSION['role']) ||
    $_SESSION['role'] !== 'Admin'
) {
    header("Location: loginh.php");
    exit();
}
if (!empty($_COOKIE['username']) && !empty($_COOKIE['email']) && !empty($_COOKIE['role'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['email']    = $_COOKIE['email'];
    $_SESSION['role']     = $_COOKIE['role'];
}

header('Content-Type: json');
$response = [
    "success" => true,
    "username" => $_SESSION['username'],
    "email"    => $_SESSION['email'],
    "role"     => $_SESSION['role']
];

echo json_encode($response);
