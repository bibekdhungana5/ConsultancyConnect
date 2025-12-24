<?php
session_start();
include "../../db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password']; 
    
    $result = $conn->query("SELECT * FROM admin WHERE email='$email'");

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();

        if ($admin['password'] === $password) { 
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            header("Location:  /project/admin/admin_dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "Admin not found.";
    }

    header("Location: /project/auth/admin-login/login.php");
    exit;
} else {
    header("Location: /project/auth/admin-login/login.php");
    exit;
}
?>
