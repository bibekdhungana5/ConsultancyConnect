<?php
session_start();
include "../../db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("location: /project/pages/explore/explore.php");
        exit;
    } else {
        $_SESSION['error'] = "Password does not match";
        header("Location: ./login.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Account not found";
    header("Location: ./login.php");
    exit;
}
