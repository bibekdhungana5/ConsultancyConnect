<?php
include "../../db.php";


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// check email
$check = $conn->query("SELECT id FROM users WHERE email='$email'");
if ($check->num_rows > 0) {
    header("Location: register.php?error=Email already registered");
    exit;
}

// hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// insert
$sql = "INSERT INTO users (full_name,email,phone,password)
        VALUES ('$name','$email','$phone','$hashedPassword')";

if ($conn->query($sql)) {
    header("Location: /project/auth/login/login.php?success=Registration successful. Please login.");
} else {
    header("Location: register.php?error=Registration failed");
}
exit;
