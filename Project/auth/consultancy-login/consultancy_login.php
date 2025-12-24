<?php
session_start();
include "../../db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query(
    "SELECT * FROM consultancies 
     WHERE email='$email' AND status='approved'"
);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        $_SESSION['consultancy_id'] = $row['id'];
        header("Location: /project/consultancy/dashboard.php");
        exit;
    }
}

$_SESSION['error'] = "Invalid login or consultancy not approved yet";
header("Location: ./login.php");
exit;
